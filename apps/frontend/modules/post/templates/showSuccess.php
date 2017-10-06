<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_post->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $blog_post->getName() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $blog_post->getTitle() ?></td>
    </tr>
    <tr>
      <th>Text:</th>
      <td><?php echo $blog_post->getText() ?></td>
    </tr>
    <tr>
      <th>Activ:</th>
      <td><?php echo $blog_post->getActiv() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $blog_post->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('post/edit?id='.$blog_post->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('post/index') ?>">List</a>
