console.log("Script loaded");
document.addEventListener("DOMContentLoaded", function () {
  // Define dimensions and margins
  const width = 800;
  const height = 600;
  const margin = { top: 70, right: 20, bottom: 80, left: 80 };

  // Select the div with id "chart" and append an SVG
  const svg = d3
    .select("div#chart")
    .append("svg")
    .attr("width", width + 200)
    .attr("height", height)
    .append("g")
    .attr("transform", `translate(${margin.left},${margin.top})`);

  // Hardcoded data
  var data = [
    {
      quarter: "Q1 2023",
      foot: 40938,
      vehicle: 134650,
      "total kilometers": 175588,
    },
    {
      quarter: "Q2 2023",
      foot: 45061,
      vehicle: 160093,
      "total kilometers": 205154,
    },
    {
      quarter: "Q3 2023",
      foot: 50163,
      vehicle: 162144,
      "total kilometers": 255317,
    },
    {
      quarter: "Q4 2023",
      foot: 46107,
      vehicle: 148052,
      "total kilometers": 194159,
    },
  ];

  // Data processing logic
  const slices = Object.keys(data[0])
    .slice(1)
    .map(function (id) {
      return {
        id: id,
        values: data.map(function (d) {
          return {
            quarter: d.quarter,
            measurement: +d[id],
          };
        }),
      };
    });

  //-----------------------------SCALES-----------------------------
  const xScale = d3
    .scaleBand()
    .domain(data.map((d) => d.quarter))
    .range([0, width - margin.left - margin.right])
    .padding(0.1);

  const yMax = d3.max(slices, (c) =>
    d3.max(c.values, (d) => d.measurement + 5)
  );
  const yScale = d3
    .scaleLinear()
    .domain([0, yMax])
    .range([height - margin.top - margin.bottom, 0]);

  //-----------------------------AXES-----------------------------
  const xAxis = d3.axisBottom(xScale);
  const yAxis = d3.axisLeft(yScale);

  //-----------------------------DRAWING-----------------------------
  // Append lines
  var color = d3.scaleOrdinal(d3.schemeCategory10);
  slices.forEach(function (slice, i) {
    svg
      .append("path")
      .datum(slice.values)
      .attr("fill", "none")
      .attr("stroke", color(i))
      .attr("stroke-width", 1.5)
      .attr(
        "d",
        d3
          .line()
          .x(function (d) {
            return xScale(d.quarter) + xScale.bandwidth() / 2;
          })
          .y(function (d) {
            return yScale(d.measurement);
          })
      );
  });

  // Append circles and text for each data point
  slices.forEach(function (slice) {
    slice.values.forEach(function (d) {
      const cx = xScale(d.quarter) + xScale.bandwidth() / 2;
      const cy = yScale(d.measurement);
      let color;
      switch (slice.id) {
        case "foot":
          color = "orange";
          break;
        case "vehicle":
          color = "green";
          break;
        case "total kilometers":
          color = "red";
          break;
        default:
          color = "black";
      }
      svg
        .append("circle")
        .attr("cx", cx)
        .attr("cy", cy)
        .attr("r", 4)
        .style("fill", color);
      svg
        .append("text")
        .attr("x", cx)
        .attr("y", cy - 8)
        .style("text-anchor", "middle")
        .text(d.measurement + " km");
    });
  });

  // Append text labels at the end of each line representing each slice
  slices.forEach(function (slice) {
    const lastDataPoint = slice.values[slice.values.length - 1];
    const lastCx = xScale(lastDataPoint.quarter) + xScale.bandwidth() / 2;
    const lastCy = yScale(lastDataPoint.measurement);

    // Increase the offset value for positioning the text labels outside the right margin
    const textX = width; // Move further outside the right margin

    svg
      .append("text")
      .attr("x", textX)
      .attr("y", lastCy - 10)
      .style("text-anchor", "middle")
      .text(`${slice.id}`);
  });

  // Append axes
  svg
    .append("g")
    .attr("class", "x-axis")
    .attr("transform", `translate(0,${height - margin.top - margin.bottom})`)
    .call(xAxis);

  svg.append("g").attr("class", "y-axis").call(yAxis);
});
