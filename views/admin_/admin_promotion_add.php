<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//?>
<form method="post" action="" >
    <input type="hidden" name="id" value=""/>
    <div class="form-group">
        <label for="product_name">Название продукта:</label>
            <textarea rows="3" id="product_name" name="product_name"
                      class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена:</label>
        <input type="text" id="price" name="price" value=""
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="firm">Фирма:</label>
        <input type="text" id="firm" name="firm" value=""
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="site">Сайт:</label>
        <input type="text" id="site" name="site" value=""
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="is_active">Publish</label>
        <input type="checkbox" id="is_active" name="is_active" checked="checked"/>
    </div>
    <input type="submit" class="btn btn-success"/>
</form>
