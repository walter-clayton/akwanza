
console.log("Script loaded");
document.addEventListener('DOMContentLoaded', function(d3) {
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

// Load data from CSV file

d3.csv("<?php echo get_template_directory_uri(); ?>/data.csv").then(function (data) {
console.log( data);
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
  console.log("Column headers", Object.keys(data[0]));
  console.log("Column headers without quarter", Object.keys(data[0]).slice(1));
  console.log("Slices", slices);
  console.log("First slice", slices[0]);
  console.log("Second slice", slices[1]);
  console.log("A array", slices[1].values);
  console.log("Quarter element", slices[0].values[0].quarter);
  console.log("Array length", slices[0].values.length);

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

  // Append circles and text for each data point (foot)

  slices[0].values.forEach(function (d) {
    const cx = xScale(d.quarter) + xScale.bandwidth() / 2;
    const cy = yScale(d.measurement);
    svg
      .append("circle")
      .attr("cx", cx)
      .attr("cy", cy)
      .attr("r", 4)
      .style("fill", "orange");
    svg
      .append("text")
      .attr("x", cx)
      .attr("y", cy - 8)
      .style("text-anchor", "middle")
      .text(d.measurement + " km");
  });

  // Append circles and text for each data point (total kilometers)
  slices[2].values.forEach(function (d) {
    const cx = xScale(d.quarter) + xScale.bandwidth() / 2;
    const cy = yScale(d.measurement);
    svg
      .append("circle")
      .attr("cx", cx)
      .attr("cy", cy)
      .attr("r", 4)
      .style("fill", "red");
    svg
      .append("text")
      .attr("x", cx)
      .attr("y", cy - 8)
      .style("text-anchor", "middle")
      .text(d.measurement + " km");
  });

  // Append circles and text for each data point (vehicle)
  slices[1].values.forEach(function (d) {
    const cx = xScale(d.quarter) + xScale.bandwidth() / 2;
    const cy = yScale(d.measurement);
    svg
      .append("circle")
      .attr("cx", cx)
      .attr("cy", cy)
      .attr("r", 4)
      .style("fill", "green");
    svg
      .append("text")
      .attr("x", cx)
      .attr("y", cy - 8)
      .style("text-anchor", "middle")
      .text(d.measurement + " km");
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
});
