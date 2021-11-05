<?php
    function formatPrice(float $price)
    {
        return number_format((float)$price, 2, ",", ".");
    }
?>