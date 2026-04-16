<?php
function getItemStockStatus(int $quantity): string
{
    if ($quantity <= 0) {
        return 'Hết hàng';
    } elseif ($quantity <= 5) {
        return 'Sắp hết hàng';
    }
    return 'Còn hàng';
}

function formatItemName(string $name,string $brand): string
{
    return strtoupper($name) . " (" . $brand . ")";
}

function calculateTotalStock(array $items): int
{
    return array_reduce($items,function ($carry,$item) {
        return $carry + $item['quantity'];
    },0);
}

function filterInStockItems(array $items): array
{
    return array_values(array_filter($items,function ($item) {
        return $item['quantity'] > 0;
    }));
}