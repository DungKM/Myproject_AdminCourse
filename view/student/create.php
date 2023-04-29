<form action="?action=store&controller=student" method="post">
    <label for="">Name</label>
    <input type="text" name="name">
    <br>
    Class
    <select name="id_class" id="">
        <?php foreach ($class as $item) : ?>
         <option value="<?php  echo $item['id'] ?>"><?php  echo $item['name'] ?></option>
        <?php endforeach ?>
    </select>
    <button>Submit</button>
</form>