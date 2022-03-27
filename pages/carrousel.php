<?php
session_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/carrou.css" rel="stylesheet"/>
    <title>carrou</title>
</head>
<body>

   <h4>Hello</h4>  


    <div id="drag">
        <div id="spin">
            <img src="../assets/img/NoMercyfortherude.jpg" alt="NoMercyfortherude">
            <img src="../assets/img/thehost.jpg" alt="thehost">
            <img src="../assets/img/Nowheretohide.jpg" alt="Nowheretohide">
            <img src="../assets/img/Anna.jpg" alt="Anna">
            <img src="../assets/img/Unhommealahauteur.jpg" alt="Unhommealahauteur">
            <img src="../assets/img/Rec4.jpg" alt="">
            <img src="../assets/img/ploy.jpg" alt="">
            <img src="../assets/img/theeye2.jpg" alt="">
        </div>
        <div id="ground"></div>
    </div>
    <script>
            var radius = 340;
            var autoRate = true;
            var rotateSpeed = -60;
            var imgWidth = 190;
            var imgHeight = 230;
                setTimeout(init, 1000);
                    var odrag = document.getElementById('drag');
                    var ospin = document.getElementById('spin');
                    var aImg = ospin.getElementByTagName('img');
                    var aEle = [...aImg];
                    
                    ospin.style.width = imgWidth + "px";
                    ospin.style.height = imgHeight + "px";

                    var ground =  document.getelementById('ground');
                    ground.style.width = radius * 3 + "px";
                    ground.style.height = radius * 3 + "px";

                        function init(delayTime){
                            for (let i = 0; i < aEle.length; i++){
                                aEle[i].style.transform = "rotateY(" + (i* (360 / aEle.length)) + "deg) tanslateZ(" + radius + "px)";
                                aEle[i].style.transition = "transform 1s";
                                eEle[i].style.transitionDelay = delayTime||(aEle.length-i) / 4 + "s";

                            }
                        }

                        function applyTransform(obj){
                            if(tY > 180) tY = 180;
                            if(tY < 0) tY = 0;

                            obj.style.transform = "rotateX(" + (-tY) + "deg) rotateY(" + (tX) + "deg)";
                        }

                        function playSPin(yes){
                            ospin.style.animationPlayState = (yes ? 'running' : 'paused');
                        }

                        var sX,sY, nX, nY, desX = 0, 
                        desY = 0, 
                        tX = 0, 
                        tY = 10;

                        if(autoRotate){
                            var animationName = (rotateSpeed>0 ? 'spin' : 'spinRevert');
                            ospin.style.animation = `${animationName} ${Math.abs(rotateSpeed)}s infinite linear`;
                        }

                        document.onpointerdown = function (e){
                            clearInterval(odrag.timer);
                            e = e || window.event;
                            var sX = e.clientX,
                                sY = e.clientY;
                        

                        this.onpointermove = function (e){
                            e = e || window.event;
                            var nX = e.clientX,
                                nY = e.clientY;
                                
                                    desX = nX - sX;
                                    desY = nY - sY;
                                    tX += desX * 0.1;
                                    tY += desY * 0.1;

                                    applyTransform(odrag);

                                    sX = nX;
                                    sY = nY;

                        }

                        this.onpointerup = function (e){
                            odrag.timer = setInterval(function (){
                                desX *= 0.95;
                                desY *= 0.95;
                                tX += desX * 0.1;
                                tY += desY * 0.1;

                                applyTransform(odrag);
                                playSpin(false);

                                if(Math.abs(desX) < 0.5 && Math.abs(desY) < 0.5){
                                    clearInterval(odrag.timer);
                                    playSpin(true);
                                }
                            }, 17);

                            this.onmspointermove = this.onpointerup = null;
                        }
                        return false;
                    }
    </script>
</body>
</html>