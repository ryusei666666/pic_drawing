$(function () {

    const text = $(".text");
    let i = 0;

    let txt = $("#textarea")[0].value;
    let replacedText;

    $(canvas).on('click', function (e) {
        console.log(e.pageX, e.pageY);

        // 生成したものの場所を設定
        // まず改行らしき文字を\nに統一。\r、\r\n → \n
        txt = txt.replace(/\r\n/g, '\n');
        txt = txt.replace(/\r/g, '\n');
    
        // 改行を区切りにして入力されたテキストを分割して配列に保存する。
        let lines = txt.split('\n');
  
        let replacedText = lines.join('<br>');
        
        // let sourceStr = $("#textarea")[0].value ;
        // let a = sourceStr.replace( "","<br>" ) ;
        text.eq(0)[0].innerHTML = replacedText;
        text.eq(0).css({
            'position': 'absolute',
            'left': `${e.pageX - text.eq(0)[0].clientWidth/2}` + `px`,
            'top': `${e.pageY - text.eq(0)[0].clientHeight/2}` + `px`,
            'display': 'block'
        });
        console.log(text.eq(0)[0]);
        console.log($("#textarea")[0]);
    
        i++;
    });
    $('.textarea').on('change', function () {
        text.eq(0)[0].innerHTML = $("#textarea")[0].value;
    })

    $('.box1').on('click', function () {
        text.eq(0).css({
           'color': 'white'
       }) 
    });
    $('.box2').on('click', function () {
        text.eq(0).css({
           'color': 'black'
       }) 
    });
    $('.box3').on('click', function () {
        text.eq(0).css({
           'color': 'blue'
       }) 
    });
    $('.box4').on('click', function () {
        text.eq(0).css({
           'color': 'red'
       }) 
    });
    $('.box5').on('click', function () {
        text.eq(0).css({
           'color': 'yellow'
       }) 
    });

    let rotate = 0;
    $('.rotate1').on('click', function () {
        rotate -= 5
        text.eq(0).css({
           'transform': 'rotate('+ rotate +'deg)'
       }) 
    });
    $('.rotate2').on('click', function () {
        rotate += 5
        text.eq(0).css({
           'transform': 'rotate('+ rotate +'deg)'
       }) 
    });

    $('.ok').on('click', function () {
        console.log(text.eq(0)[0].style.cssText);
        console.log(txt);

    })

})