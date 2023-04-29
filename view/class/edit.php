<form action="?action=update&controller=class" method="post">
    <label for="">Name</label>
    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
    <input type="text" name="name" value="<?php echo $each['name']?>">
    <button>Submit</button>
</form>