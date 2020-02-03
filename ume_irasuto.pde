 /* @pjs preload="files/newImg.jpg"; */
PImage img; //画像データ

void setup() {
  img = loadImage("files/newImg.jpg");
  img.resize(screen.width, screen.width * img.height /img.width);
  size(screen.width, screen.width * img.height /img.width);
  background(255); //背景
  noStroke(); //枠線は無し
  rectMode(CENTER); //中心を原点に四角形を描画
  frameRate(2000);
  noLoop();
}

void draw() {
  for (int i=0; i<300001; i++) {
    //場所をランダムに決定
    int x = int(random(width));
    int y = int(random(height));
    //色を取得
    color col = img.get(x, y);
    fill(col, 127);
    pushMatrix();
    translate(x, y);
    //色の色相を回転角度に
    rotate(map(hue(col), 0, 255, 0, PI));
    //色の再度を四角形の幅に
    float w = map(saturation(col), 0, 255, 1, 40);
    rect(0, 0, w, 1.5);
    popMatrix();
    if(i==300000){
       //画像を作成
      // PImage saveImg = createImage(width, height, RGB);
      
      //画面を画像にコピー
      // loadPixels();
      // saveImg.pixels = pixels;
      // saveImg.updatePixels();
      
      // //画像のピクセル情報を切り出して保存
      // saveImg = saveImg.get(0, 0, width, height);
      // saveImg.save("pic.png");
      // saveFrame("pic.jpg");
      // save("picjpg");
    };

  }
}
