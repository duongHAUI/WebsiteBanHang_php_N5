<?php

include "constants.php";

session_start();

if (!function_exists('set_flash_message')) {
    /**
     * Set form error with flash message
     *
     * @param string $name
     * @param string $message
     * @return void
     */
    function set_flash_message(string $name, string $message, string $type = SUCCESS): void
    {
        if (isset($_SESSION['flash'][$name])) {
            unset($_SESSION['flash'][$name]);
        }

        $_SESSION['flash'][$name] = compact('type', 'message');
    }
}

if (!function_exists('get_flash_message')) {
    /**
     * Get error from flash message
     *
     * @param string $name
     * @param string $type
     * @return void
     */
    function get_flash_message(string $name): void
    {
        if (!isset($_SESSION['flash'][$name])) {
            return;
        }

        // get message from the session
        $flash_message = $_SESSION['flash'][$name];

        // delete the flash message
        unset($_SESSION['flash'][$name]);

        // display the flash message
        echo format_flash_message($flash_message);
    }
}

if (!function_exists('format_flash_message')) {
    /**
     * Format a error message
     *
     * @param array $flash_message
     * @return string
     */
    function format_flash_message(array $flash_message = []): string
    {
        return "<div class='alert alert-{$flash_message['type']}'>{$flash_message['message']}</div>";
    }
}

if (!function_exists('set_old_value')) {
    /**
     * Set old value from input
     *
     * @param array $data
     * @return void
     */
    function set_old_value(array $data): void
    {
        $_SESSION['old_values'] = $data;
    }
}

if (!function_exists('old'))
{
    /**
     * Get old value
     *
     * @param $name
     * @return string
     */
    function old($name): string
    {
        if (empty($_SESSION['old_values'][$name])) {
            return '';
        }

        $oldValue = $_SESSION['old_values'][$name];
        unset($_SESSION['old_values'][$name]);
        return $oldValue;
    }
}

if (!function_exists('remove_old_value')) {
    /**
     * Remove old value from input
     *
     * @return void
     */
    function remove_old_value(): void
    {
        unset($_SESSION['old_values']);
    }
}