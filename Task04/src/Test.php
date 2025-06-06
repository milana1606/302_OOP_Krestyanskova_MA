<?php

namespace App;

function runTest(): void
{
    echo "\n\n\n+++++++++++++++++++ Запуск тестов +++++++++++++++++++\n";
    echo "================================================================\n\n";

    testStackConstructor();

    testStackPush();

    testStackPop();

    testStackTop();

    testStackIsEmpty();

    testStackCopy();

    testCompareStrings();

    echo "\nВсе тесты завершены!\n";
}

function testStackConstructor(): void
{
    echo "\033[33mТестирование конструктора Stack и метода toString...\033[0m\n";

    $stack1 = new Stack();
    echo "Пустой стек: " . $stack1 . "\n";
    if ($stack1->__toString() !== '[]') {
        echo "\033[31mОшибка: Пустой стек должен быть представлен как []\033[0m\n";
    }

    $stack2 = new Stack(1, 2, 3, 4, 5);
    echo "Стек с элементами: " . $stack2 . "\n";
    if ($stack2->__toString() !== '[1->2->3->4->5]') {
        echo "\033[31mОшибка: Стек должен быть представлен как [1->2->3->4->5]\033[0m\n";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}

function testStackPush(): void
{
    echo "\033[33mТестирование метода push стека...\033[0m\n";

    $stack = new Stack();
    $stack->push(1);
    echo "После push(1): " . $stack . "\n";
    if ($stack->__toString() !== '[1]') {
        echo "\033[31mОшибка: Стек должен содержать один элемент\n\033[0m";
    }

    $stack->push(2, 3, 4);
    echo "После push(2, 3, 4): " . $stack . "\n";
    if ($stack->__toString() !== '[4->3->2->1]') {
        echo "\033[31mОшибка: Элементы должны добавляться в верх (слева)\n\033[0m";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}

function testStackPop(): void
{
    echo "\033[33mТестирование метода pop стека...\033[0m\n";

    $stack = new Stack(1, 2, 3);
    echo "Изначальный стек: " . $stack . "\n";

    $popped = $stack->pop();
    echo "Извлечённый элемент: " . $popped . "\n";
    echo "Стек после pop: " . $stack . "\n";
    if ($popped !== 1) {
        echo "\033[31mОшибка: Извлечённый элемент должен быть 1\n\033[0m";
    }
    if ($stack->__toString() !== '[2->3]') {
        echo "\033[31mОшибка: Стек должен содержать оставшиеся элементы\n\033[0m";
    }

    $stack->pop();
    $stack->pop();
    $emptyPop = $stack->pop();
    echo "Извлечение из пустого стека возвращает: " . var_export($emptyPop, true) . "\n";
    if ($emptyPop !== null) {
        echo "\033[31mОшибка: Извлечение из пустого стека должно возвращать null\n\033[0m";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}

function testStackTop(): void
{
    echo "\033[33mТестирование метода top стека...\033[0m\n";

    $stack = new Stack(1, 2, 3);
    echo "Изначальный стек: " . $stack . "\n";

    $top = $stack->top();
    echo "Верхний элемент: " . $top . "\n";
    echo "Стек после top: " . $stack . "\n";
    if ($top !== 1) {
        echo "\033[31mОшибка: Верхний элемент должен быть 1\n\033[0m";
    }
    if ($stack->__toString() !== '[1->2->3]') {
        echo "\033[31mОшибка: Стек должен остаться неизменным\n\033[0m";
    }

    $stack = new Stack();
    $emptyTop = $stack->top();
    echo "Верхний элемент из пустого стека возвращает: " . var_export($emptyTop, true) . "\n";
    if ($emptyTop !== null) {
        echo "\033[31mОшибка: Верхний элемент из пустого стека должен возвращать null\n\033[0m";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}

function testStackIsEmpty(): void
{
    echo "\033[33mТестирование метода isEmpty стека...\033[0m\n";

    $emptyStack = new Stack();
    echo "Пустой стек пуст? " . var_export($emptyStack->isEmpty(), true) . "\n";
    if ($emptyStack->isEmpty() !== true) {
        echo "\033[31mОшибка: Пустой стек должен возвращать true для isEmpty\n\033[0m";
    }

    $nonEmptyStack = new Stack(1, 2, 3);
    echo "Непустой стек пуст? " . var_export($nonEmptyStack->isEmpty(), true) . "\n";
    if ($nonEmptyStack->isEmpty() !== false) {
        echo "\033[31mОшибка: Непустой стек должен возвращать false для isEmpty\n\033[0m";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}

function testStackCopy(): void
{
    echo "\033[33mТестирование метода copy стека...\033[0m\n";

    $original = new Stack(1, 2, 3);
    echo "Изначальный стек: " . $original . "\n";

    $copy = $original->copy();
    echo "Копия стека: " . $copy . "\n";
    if ($copy->__toString() !== $original->__toString()) {
        echo "\033[31mОшибка: Копия должна иметь те же элементы\n\033[0m";
    }

    $original->pop();
    echo "Изначальный стек после pop: " . $original . "\n";
    echo "Копия после pop из оригинала: " . $copy . "\n";
    if ($copy->__toString() !== '[1->2->3]') {
        echo "\033[31mОшибка: Изменение оригинала не должно затронуть копию\n\033[0m";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}

function testCompareStrings(): void
{
    echo "\033[33mТестирование функции compareStrings...\033[0m\n";

    $result1 = compareStrings("ab", "ab");
    echo "compareStrings(\"ab\", \"ab\") = " . var_export($result1, true) . "\n";
    if ($result1 !== true) {
        echo "\033[31mОшибка: \"ab\" должно быть равно true\n\033[0m";
    }

    $result2 = compareStrings("a", "a");
    echo "compareStrings(\"a\", \"a\") = " . var_export($result2, true) . "\n";
    if ($result2 !== true) {
        echo "\033[31mОшибка: \"a\" должно быть равно true\n\033[0m";
    }

    $result3 = compareStrings("abc##", "ab#c#");
    echo "compareStrings(\"abc\", \"abc\") = " . var_export($result3, true) . "\n";
    if ($result3 !== true) {
        echo "\033[31mОшибка: \"abc\" должно быть равно true\n\033[0m";
    }

    $result4 = compareStrings("a", "a");
    echo "compareStrings(\"a\", \"a\") = " . var_export($result4, true) . "\n";
    if ($result4 !== true) {
        echo "\033[31mОшибка: \"a\" должно быть равно true\n\033[0m";
    }

    $result5 = compareStrings("a#b", "b#");
    echo "compareStrings(\"a\", \"b\") = " . var_export($result5, true) . "\n";
    if ($result5 !== false) {
        echo "\033[31mОшибка: \"a\" и \"b\" не должны быть равны\n\033[0m";
    }

    $result6 = compareStrings("a#", "a##");
    echo "compareStrings(\"a\", \"a\") = " . var_export($result6, true) . "\n";
    if ($result6 !== true) {
        echo "\033[31mОшибка: \"a\" должно быть равно true\n\033[0m";
    }

    echo "\033[32m===== Пройден =====\033[0m\n\n";
}
