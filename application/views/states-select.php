<select name="state" id="state" class="form-control">
    <option value="">Select a State</option>
    <?php
    if (!empty($states)) {
        foreach ($states as $state) {
            ?>
            <option value="<?php echo $state['id'];?>"><?php echo $state['name'];?></option>
            <?php
        }
    }
    ?>
</select>