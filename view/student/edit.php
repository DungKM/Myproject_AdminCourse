<form action="?action=update&controller=student" method="post">
    <label for="">Name</label>
    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
    <input type="text" name="name" value="<?php echo $each['name']?>">
    <br>
    Class
    <select name="id_class" id="">
        <?php foreach ($class as $item) : ?>
         <option value="<?php  echo $item['id'] ?>" <?php if($item['id'] === $each['id_class']) echo "selected" ?>><?php  echo $item['name'] ?></option>
        <?php endforeach ?>
    </select>
    <button>Submit</button>
</form>