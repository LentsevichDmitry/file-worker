<?php
function getPeople()
{
    $line = "<ul>";
    foreach (file('people.txt') as $item) {
        $item = trim($item);
        list($email, $name) = explode('|', $item);
        $line .= "<li>$email - $name</li>";
    }
    $line .= "</ul>";

    return $line;
}

$config = ['title_name' => 'Welcome to the Page', 'color' => 'purple', 'name' => 'Dmitry', 'people' => getPeople()];
$page = file_get_contents('example_page.html');
foreach ($config as $key => $value){
    $page = str_replace('{'. $key .'}', $value, $page);
}

file_put_contents('page.html', $page);

echo file_get_contents('page.html');