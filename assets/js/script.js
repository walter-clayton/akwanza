/**
 * This script generates a line chart using D3.js library.
 * The chart displays quarterly data for different measurements.
 * The data is hardcoded and includes measurements for "on foot", "by vehicle", and "total kilometers".
 * The script defines dimensions, margins, and scales for the chart.
 * It then processes the data and generates the necessary SVG elements to draw the chart.
 * Finally, it appends axes and labels to the chart.
 */
console.log("Script loaded");
document.addEventListener("DOMContentLoaded", function () {
  // Define dimensions and margins
  const width = 600;
  const height = 600;
  const margin = { top: 50, right: 10, bottom: 80, left: 50 };

  // Select the div with id "chart" and append an SVG
  const svg = d3
    .select("div#chart")
    .append("svg")
    .attr("id", "chart-svg")
    .attr("width", width + 40)
    .attr("height", height)
    .append("g")
    .attr("transform", `translate(${margin.left},${margin.top})`);

  // Hardcoded data
  var data = [
    {
      quarter: "Q1 2023",
      "on foot": 40938,
      "by vehicle": 134650,
      "total kilometers": 175588,
    },
    {
      quarter: "Q2 2023",
      "on foot": 45061,
      "by vehicle": 160093,
      "total kilometers": 205154,
    },
    {
      quarter: "Q3 2023",
      "on foot": 50163,
      "by vehicle": 162144,
      "total kilometers": 255317,
    },
    {
      quarter: "Q4 2023",
      "on foot": 46107,
      "by vehicle": 148052,
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
        .text(d.measurement);
    });
  });

  // Append text labels at the end of each line representing each slice
  slices.forEach(function (slice) {
    const lastDataPoint = slice.values[slice.values.length - 2];
    const lastCx = xScale(lastDataPoint.quarter) + xScale.bandwidth() / 2;
    const lastCy = yScale(lastDataPoint.measurement);

    // Increase the offset value for positioning the text labels outside the right margin
    const textX = width - 90; // Move further outside the right margin

    svg
      .append("text")
      .attr("x", textX)
      .attr("y", lastCy + 50)
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
