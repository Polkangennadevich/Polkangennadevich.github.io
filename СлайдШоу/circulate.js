$(window).load(function() {
    $("#ball").css("left", $("#ball").position().left).circulate({
            sizeAdjustment: 160,
            speed: 2000,
            width: -820,
            height: 50,
            loop: true,
            zIndexValues: [1, 50, 50, 1]
    });

    function startBallOne() {
        $("#orange-ball").circulate({
            speed: 5000,
            height: 100,
            width: -2800,
            sizeAdjustment: 40,
            loop: true,
            zIndexValues: [1, 1, 3, 3]
        });
    }
    
    function startBallTwo() {
        $("#blue-ball").circulate({
            speed: 4000,
            height: 120,
            width: -1000,
            sizeAdjustment: 35,
            loop: true,
            zIndexValues: [2, 2, 2, 2]
        })
    }
    
    function startBallThree() {
        $("#pink-ball").circulate({
            speed: 5000,
            height: 140,
            width: -1700,
            sizeAdjustment: 30,
            loop: true,
            zIndexValues: [3, 3, 1, 1]
        }).fadeIn();
    }
            
    startBallOne();
    setTimeout(startBallTwo, 2000);
    setTimeout(startBallThree, 4000);
    
});
