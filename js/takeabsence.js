localStorage.setItem("checked", "");

const allStudents = document.getElementById("allstudents");
const allYStudents = document.getElementById("allystudents");
const allNStudents = document.getElementById("allnstudents");
const allDStudents = document.getElementById("alldstudents");
const allNNStudents = document.getElementById("allnnstudents");
const allUNStudents = document.getElementById("allunstudents");

let numOfStudentsInTable = document.getElementById("numOfStudentsInTable").innerHTML;

allStudents.innerHTML = numOfStudentsInTable;
allUNStudents.innerHTML = numOfStudentsInTable;

for (i=1; i<=numOfStudentsInTable; i++){
    document.getElementById(`${i}n`).checked = false;
    document.getElementById(`${i}y`).checked = false;
}


function chooseOption(optionNum) {
    if (optionNum.includes("y")) {
        if (localStorage.getItem("checked").includes(`${optionNum.replace("y", "")}n`)) {
            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("y", "")}n-`, ""));

            let optionId = `${optionNum.replace("y", "")}n`;
            let colorBox = document.getElementById(optionId).parentElement;
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
    }else{
        if (localStorage.getItem("checked").includes(`${optionNum.replace("n", "")}y`)) {
            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("n", "")}y-`, ""));

            let optionId = `${optionNum.replace("n", "")}y`;
            let colorBox = document.getElementById(optionId).parentElement;
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
        }else{
            if (localStorage.getItem("checked").includes(`${optionNum.replace("d", "")}y`)) {
                localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("d", "")}y-`, ""));
    
                let optionId = `${optionNum.replace("d", "")}y`;
                let colorBox = document.getElementById(optionId).parentElement;
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
            }else{
                if (localStorage.getItem("checked").includes(`${optionNum.replace("d", "")}n`)) {
                    localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("d", "")}n-`, ""));
        
                    let optionId = `${optionNum.replace("d", "")}n`;
                    let colorBox = document.getElementById(optionId).parentElement;
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
                }else{
                    if (localStorage.getItem("checked").includes(`${optionNum.replace("n", "")}d`)) {
                        localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("n", "")}d-`, ""));
            
                        let optionId = `${optionNum.replace("n", "")}d`;
                        let colorBox = document.getElementById(optionId).parentElement;
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
                    }else{
                        if (localStorage.getItem("checked").includes(`${optionNum.replace("y", "")}d`)) {
                            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("y", "")}d-`, ""));
                
                            let optionId = `${optionNum.replace("y", "")}d`;
                            let colorBox = document.getElementById(optionId).parentElement;
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
                    }
                }
            }
        }
    }

    if (optionNum.includes("d")) {
        if (localStorage.getItem("checked").includes(`${optionNum.replace("y", "")}n`)) {
            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("y", "")}n-`, ""));

            let optionId = `${optionNum.replace("y", "")}n`;
            let colorBox = document.getElementById(optionId).parentElement;
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
    }else{
        if (localStorage.getItem("checked").includes(`${optionNum.replace("n", "")}y`)) {
            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("n", "")}y-`, ""));

            let optionId = `${optionNum.replace("n", "")}y`;
            let colorBox = document.getElementById(optionId).parentElement;
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
        }else{
            if (localStorage.getItem("checked").includes(`${optionNum.replace("d", "")}y`)) {
                localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("d", "")}y-`, ""));
    
                let optionId = `${optionNum.replace("d", "")}y`;
                let colorBox = document.getElementById(optionId).parentElement;
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
            }else{
                if (localStorage.getItem("checked").includes(`${optionNum.replace("d", "")}n`)) {
                    localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("d", "")}n-`, ""));
        
                    let optionId = `${optionNum.replace("d", "")}n`;
                    let colorBox = document.getElementById(optionId).parentElement;
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
                }else{
                    if (localStorage.getItem("checked").includes(`${optionNum.replace("n", "")}d`)) {
                        localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("n", "")}d-`, ""));
            
                        let optionId = `${optionNum.replace("n", "")}d`;
                        let colorBox = document.getElementById(optionId).parentElement;
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
                    }else{
                        if (localStorage.getItem("checked").includes(`${optionNum.replace("y", "")}d`)) {
                            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("y", "")}d-`, ""));
                            let optionId = `${optionNum.replace("y", "")}d`;
                            let colorBox = document.getElementById(optionId).parentElement;
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
                    }
                }
            }
        }
    }

    if (optionNum.includes("n")) {
        if (localStorage.getItem("checked").includes(`${optionNum.replace("y", "")}n`)) {
            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("y", "")}n-`, ""));

            let optionId = `${optionNum.replace("y", "")}n`;
            let colorBox = document.getElementById(optionId).parentElement;
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
    }else{
        if (localStorage.getItem("checked").includes(`${optionNum.replace("n", "")}y`)) {
            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("n", "")}y-`, ""));

            let optionId = `${optionNum.replace("n", "")}y`;
            let colorBox = document.getElementById(optionId).parentElement;
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
        }else{
            if (localStorage.getItem("checked").includes(`${optionNum.replace("d", "")}y`)) {
                localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("d", "")}y-`, ""));
    
                let optionId = `${optionNum.replace("d", "")}y`;
                let colorBox = document.getElementById(optionId).parentElement;
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
            }else{
                if (localStorage.getItem("checked").includes(`${optionNum.replace("d", "")}n`)) {
                    localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("d", "")}n-`, ""));
        
                    let optionId = `${optionNum.replace("d", "")}n`;
                    let colorBox = document.getElementById(optionId).parentElement;
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
                }else{
                    if (localStorage.getItem("checked").includes(`${optionNum.replace("n", "")}d`)) {
                        localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("n", "")}d-`, ""));
            
                        let optionId = `${optionNum.replace("n", "")}d`;
                        let colorBox = document.getElementById(optionId).parentElement;
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
                    }else{
                        if (localStorage.getItem("checked").includes(`${optionNum.replace("y", "")}d`)) {
                            localStorage.setItem("checked", localStorage.getItem("checked").replace(`${optionNum.replace("y", "")}d-`, ""));

                            let optionId = `${optionNum.replace("y", "")}d`;
                            let colorBox = document.getElementById(optionId).parentElement;
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
                    }
                }
            }
        }
    }


    let optionId = optionNum;
    let colorBox = document.getElementById(optionId).parentElement;

    let targetColor = '#4CAF50';
    if (optionId.includes("n")){
        targetColor = "#e73838";
    }else{
        if (optionId.includes("d")){
            targetColor = "#9d0d0d";
        }
    }

    if (!localStorage.getItem("checked").includes(optionNum)){
        localStorage.setItem("checked", localStorage.getItem("checked") + optionNum  + "-");
    }


        let countYes = 0;
        for (let i = 0; i <= numOfStudentsInTable; i++) {
            if (document.getElementById(`${i}y`)) {
                if (document.getElementById(`${i}y`).checked) {
                    countYes++;
                }
            }
        }
        allYStudents.innerHTML = String(countYes);

        let countNo = 0;
        for (let i = 0; i <= numOfStudentsInTable; i++) {
            if (document.getElementById(`${i}n`)) {
                if (document.getElementById(`${i}n`).checked) {
                    countNo++;
                }
            }
        }
        allNStudents.innerHTML = String(countNo);

        let countDo = 0;
        for (let i = 0; i <= numOfStudentsInTable; i++) {
            if (document.getElementById(`${i}d`)) {
                if (document.getElementById(`${i}d`).checked) {
                    countDo++;
                }
            }
        }
        allDStudents.innerHTML = String(countDo);

        allNNStudents.innerHTML = String(countNo + countDo);

        let countNotRegis = 0;
        for (let i = 0; i <= numOfStudentsInTable; i++) {
            if (document.getElementById(`${i}d`)) {
                if (document.getElementById(`${i}y`).checked == false && document.getElementById(`${i}n`).checked == false && document.getElementById(`${i}d`).checked == false) {
                    countNotRegis++;
                }
            }
        }
        allUNStudents.innerHTML = String(countNotRegis);

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