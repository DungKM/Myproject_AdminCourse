<form action="?action=update" method="post">
    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
    <input type="text" name="name" value="<?php echo $each['name'] ?>">
    <button>Submit</button>
</form>