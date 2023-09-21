function calculateFibonacci() {
    const n = parseInt(document.getElementById("fibonacci-input").value);
    if (!isNaN(n) && n >= 0) {
        const result = fibonacci(n);
        document.getElementById("fibonacci-result").textContent = result;
    } else {
        alert("Please enter a non-negative number.");
    }
}

function fibonacci(n) {
    if (n <= 1) {
        return n;
    }

    let fibPrev = 0;
    let fibCurrent = 1;

    for (let i = 2; i <= n; i++) {
        const temp = fibCurrent;
        fibCurrent += fibPrev;
        fibPrev = temp;
    }

    return fibCurrent;
}

function calculateVolume() {
    const selectedShape = document.getElementById("shape-select").value;
    const cubeSide = parseFloat(document.getElementById("cube-side").value);
    const prismLength = parseFloat(document.getElementById("rectangular-prism-length").value);
    const prismWidth = parseFloat(document.getElementById("rectangular-prism-width").value);
    const prismHeight = parseFloat(document.getElementById("rectangular-prism-height").value);
    const sphereRadius = parseFloat(document.getElementById("sphere-radius").value);
    const cylinderRadius = parseFloat(document.getElementById("cylinder-radius").value);
    const cylinderHeight = parseFloat(document.getElementById("cylinder-height").value);
    const coneRadius = parseFloat(document.getElementById("cone-radius").value);
    const coneHeight = parseFloat(document.getElementById("cone-height").value);
    const pyramidBaseArea = parseFloat(document.getElementById("pyramid-base-area").value);
    const pyramidHeight = parseFloat(document.getElementById("pyramid-height").value);

    if (selectedShape === "cube" && !isNaN(cubeSide) && cubeSide >= 0) {
        const volume = cubeSide ** 3;
        document.getElementById("volume-result").textContent = `Cube Volume: ${volume.toFixed(2)}`;
    } 
    else if (selectedShape === "rectangular-prism" && !isNaN(prismLength) && !isNaN(prismWidth) && !isNaN(prismHeight) && prismLength >= 0 && prismWidth >= 0 && prismHeight >= 0) {
        const volume = prismLength * prismWidth * prismHeight;
        document.getElementById("volume-result").textContent = `Rectangular Prism Volume: ${volume.toFixed(2)}`;
    } 
    else if (selectedShape === "sphere" && !isNaN(sphereRadius) && sphereRadius >= 0) {
        const volume = (4 / 3) * Math.PI * (sphereRadius ** 3);
        document.getElementById("volume-result").textContent = `Sphere Volume: ${volume.toFixed(2)}`;
    }
    else if (selectedShape === "cylinder" && !isNaN(cylinderRadius) && !isNaN(cylinderHeight) && cylinderRadius >= 0 && cylinderHeight >= 0) {
        const volume = Math.PI * (cylinderRadius ** 2) * cylinderHeight;
        document.getElementById("volume-result").textContent = `Cylinder Volume: ${volume.toFixed(2)}`;
    }
    else if (selectedShape === "cone" && !isNaN(coneRadius) && !isNaN(coneHeight) && coneRadius >= 0 && coneHeight >= 0) {
        const volume = (1 / 3) * Math.PI * (coneRadius ** 2) * coneHeight;
        document.getElementById("volume-result").textContent = `Cone Volume: ${volume.toFixed(2)}`;
    }
    else if (selectedShape === "pyramid" && !isNaN(pyramidBaseArea) && !isNaN(pyramidHeight) && pyramidBaseArea >= 0 && pyramidHeight >= 0) {
        const volume = (1 / 3) * pyramidBaseArea * pyramidHeight;
        document.getElementById("volume-result").textContent = `Pyramid Volume: ${volume.toFixed(2)}`;
    }
    else {
        alert("Please enter positive numbers.");
    }
}

document.getElementById("shape-select").addEventListener("change", function () {
    const selectedShape = this.value;
    const formIds = ["cube-form", "rectangular-prism-form", "sphere-form", "cylinder-form", "cone-form", "pyramid-form"];

    for (const formId of formIds) {
        const form = document.getElementById(formId);
        if (formId === `${selectedShape}-form`) {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
});
