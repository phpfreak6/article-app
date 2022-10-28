<section class="blog-single">
    <div class="blog-single-post">

        <div class="blog-txt-single">
            <h4>{{$article->name}}</h4>
            <p>{{$article->descriptions}}</p>
        </div>
    </div>
    <div class="blog-single-gall">
        <?php
        $path = $article->featured_image;
        if(strpos($path, "https://") !== 0){
            $imgg = json_decode($article->featured_image, true);
            foreach($imgg as $img){
                $imgscr = "/images/".$article->id."/".$img;
            ?>
                <div class="blog-img-gall">
                    <img src="<?php echo $imgscr;?>" alt="post" class="img-fluid">
                </div>
            <?php
            }
        }else{
        ?>
            <div class="blog-img-gall">
                <img src="<?php echo $article->featured_image;?>" alt="post" class="img-fluid">
            </div>
        <?php
        }
        ?>
    </div>
</section>
<style>
section.blog-single {
    padding: 60px 20px;
}
.blog-img img {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
}
.blog-txt-single h4 {
    color: rgba(41, 41, 41, 1);
    margin: 30px 0 10px;
    font-size: 34px;
    font-family: sans-serif;
}
.blog-txt-single p {
    color: #858585;
    font-size: 18px;
    font-family: sans-serif;
    line-height: 28px;
    margin: 0 0 15px;
}
.blog-single-gall {
    border-top: 1px solid #ddd;
    margin-top: 40px;
    padding-top: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}
.blog-img-gall {
    margin: 10px 10px 10px;
    width: 23%;
}
.blog-img-gall img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
body {
    width: 100%;
    overflow-x: hidden;
    max-width: 1300px;
    margin: 0 auto !important;
    background: #f5f5f5;
}
</style>
