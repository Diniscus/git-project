<h1>News</h1>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<table border="1px">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Title</th>
        <th>Text</th>
        <th>Activ</th>
        <th>Created at</th>
    </tr>
    </thead>
    <tbody>


    <?php /*  Заполнение таблицы
  $act = true;
  for($i = 0;$i<100;$i++)
  {
      $my_new = new BlogPost();
      $my_new->setName("name nomber $i");
      $my_new->setTitle("title nomber $i");
      $my_new->setText("very-very ling text nomber $i");
      $my_new->setActiv($act);
      $my_new->setCreatedAt(mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
      $my_new->save();

      $act = !$act;
  } */
    ?>


    <?php //считаю активные записи и записываю их id
    $news_page = [];
    $i = 0;
    foreach ($blog_post_list as $blog_post): ?>
        <?php
        if ($blog_post->getActiv() == 1) {
            $news_page[$i] = $blog_post->getId();
            $i++;
        }
        ?>
    <?php endforeach; ?>
    <?php //Вывожу постранично записи, страница в GET
    $range = $_GET['page'] * 5 - 1;
    foreach ($blog_post_list as $blog_post):?>
        <?php if ($blog_post->getId() >= $news_page[$range - 4] && $blog_post->getId() <= $news_page[$range] && $blog_post->getActiv() == 1): ?>
            <tr>
                <td><?php echo $blog_post->getId() ?></td>
                <td><?php echo $blog_post->getName() ?></td>
                <td><?php echo $blog_post->getTitle() ?></td>
                <td><?php echo $blog_post->getText() ?></td>
                <td><?php echo $blog_post->getActiv() ?></td>
                <td><?php echo $blog_post->getCreatedAt() ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>


    </tbody>
</table>


<h2>
    Pages:
    <?php //генериную кнопки со страницами
    $pages = ceil(count($news_page) / 5);
    for ($i = 1; $i <= $pages; $i++) {
        echo "<input type = 'button' value = ' $i ' class = 'myButton' >";
    }
    ?>

    <script>

        function funcSuc(data) {

            var a = parseInt(data);
            location.href = "http://news/web/index.php/post?page=" + a;
        }

        $(function () { //при нажатии на кнопку получаю её значение
            $(".myButton").click(function () {
                var page = this.value;
                $.ajax({
                    url: "http://news/web/content.php",
                    type: "POST",
                    data: ({page: page}),
                    dataType: "html",
                    success: funcSuc
                });

            })
        });
    </script>
</h2>
<a href="<?php echo url_for('post/new') ?>">New</a>
