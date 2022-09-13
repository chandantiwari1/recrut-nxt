<select name="city" id="city" class="form-control">
    <option value="">Select a City</option>
    <?php
    if (!empty($cities)) {
        foreach ($cities as $city) {
            ?>
            <option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
            <?php
        }
    }
    ?>
</select>