<?php

/* • Вывести дерево с рекурсией / без рекурсии в следующем виде
* 1
* 1.2
* 1.2.5
* 1.2.6
* 1.2.6.8
* 1.3
* 1.3.7
* 1.4
*/

$tree = [
    [
        'id' => '8',
        'parent_id' => '6',
    ],
    [
        'id' => '2',
        'parent_id' => '1',
    ],
    [
        'id' => '3',
        'parent_id' => '1',
    ],
    [
        'id' => '4',
        'parent_id' => '1',
    ],
    [
        'id' => '5',
        'parent_id' => '2',
    ], [
        'id' => '1',
        'parent_id' => '0',
    ],
    [
        'id' => '6',
        'parent_id' => '2',
    ],
    [
        'id' => '7',
        'parent_id' => '3',
    ],
];


/** РЕШЕНИЕ :  */
/**
 * Строим дерево из плоского массива.
 * @param array $treeArray
 * @param string $root
 * @return array
 */
function buildTreeRecursive(array $treeArray, $root = '0'): array
{
    $branch = array();
    foreach ($treeArray as $key => $item) {
        if ($item['parent_id'] === $root) {
            $item['children'] = buildTreeRecursive($treeArray, $item['id']);
            $branch[] = $item;
            unset($treeArray[$key]);
        }
    }
    return $branch;
}


/**
 * Рекурсиивно обходим все дочерние елементы, пока не встретим вершины, у которых нет потомков
 *
 * @param $tree
 * @param array $branch
 */
function printRecursive(array $tree, array $branch = [])
{
    foreach ($tree as $node) {
        $branch[] = $node['id'];
        echo implode('.', $branch) . PHP_EOL;
        if ($node['children'] && count(@$node['children']) > 0) {
            printRecursive($node['children'], $branch);
        }
        array_pop($branch);
    }
}

echo "Pint RECURSIVE: " . PHP_EOL;
printRecursive(buildTreeRecursive($tree));

/**
 * Для каждого елемнта массива находим его путь до вершины дерева
 * на выводе разворачиваем и сортируем
 *
 * @param $array
 * @param string $root
 */
function printS1mple($array, $root = '0')
{

    $paths = [];

    foreach ($array as $item) {
        $path = [];
        $found = true;
        $parent = $item['id'];
        while ($found && $parent !== $root) {
            $found = false;
            $path[] = $parent;
            foreach ($array as $child) {
                if ($child['id'] === $parent) {
                    $parent = $child['parent_id'];
                    $found = true;
                    break;
                }
            }
        }
        $paths[] = implode('.', array_reverse($path));
    }
    sort($paths);
    echo implode(PHP_EOL, $paths) . PHP_EOL;
}

echo "Pint simple: " . PHP_EOL;
printS1mple($tree, '0');
