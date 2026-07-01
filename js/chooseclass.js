let lastItemId = "" 

function chooseClass(classNum, numOfClass) {
    if (lastItemId !== "") {
        for (i = 1; i <= numOfClass; i++) {
            document.getElementById(`class${lastItemId}`).checked = false;
        }
        
        let colorBox = document.getElementById(`class${lastItemId}`).parentElement;

        let targetColor = '#c2c2c2'; 
        let startColor = window.getComputedStyle(colorBox).backgroundColor.match(/\d+/g).map(Number); 
        let targetRGB = targetColor.match(/\w\w/g).map(v => parseInt(v, 16));
    
        let startTime = null;
    
        let animateColor = (timestamp) => {
            if (!startTime) startTime = timestamp;
            let progress = Math.min((timestamp - startTime) / 70, 1); 
            let currentRGB = startColor.map((start, i) => Math.round(start + (targetRGB[i] - start) * progress)); 
            colorBox.style.backgroundColor = `rgb(${currentRGB.join(', ')})`; 
            if (progress < 1) requestAnimationFrame(animateColor);
        };
    
        requestAnimationFrame(animateColor);
    }

    classId = `class${classNum}`;
    lastItemId = classNum;

    let colorBox = document.getElementById(classId).parentElement;
    document.getElementById(classId).checked = true

    let targetColor = '#4CAF50'; 
    let startColor = window.getComputedStyle(colorBox).backgroundColor.match(/\d+/g).map(Number); 
    let targetRGB = targetColor.match(/\w\w/g).map(v => parseInt(v, 16));

    let startTime = null;

    let animateColor = (timestamp) => {
        if (!startTime) startTime = timestamp;
        let progress = Math.min((timestamp - startTime) / 70, 1); 
        let currentRGB = startColor.map((start, i) => Math.round(start + (targetRGB[i] - start) * progress)); 
        colorBox.style.backgroundColor = `rgb(${currentRGB.join(', ')})`; 
        if (progress < 1) requestAnimationFrame(animateColor);
    };

    requestAnimationFrame(animateColor);
}

function logoutUser() {
    var logoutmaster = document.getElementById('logoutmaster');
    logoutmaster.click();
}
