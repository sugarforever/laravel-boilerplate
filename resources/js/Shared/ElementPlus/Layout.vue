<template>
    <div class="common-layout flex flex-col items-center">
        <div class="fixed top-0 w-full px-5 md:px-10 2xl:px-64 bg-white border-b dark:bg-gray-900 dark:border-gray-700 z-10">
            <nav class="relative flex flex-wrap items-center justify-between py-4 mx-auto lg:justify-between">
                <div class="flex flex-wrap items-center justify-between w-full lg:w-auto">
                    <a href="/">SHORT URLs</a>
                    <div class="flex lg:hidden">
                        <button aria-label="Toggle Menu"
                            class="px-2 py-1 ml-auto text-gray-700 rounded-md lg:hidden hover:text-indigo-500 focus:text-indigo-500 focus:outline-none "
                            id="headlessui-disclosure-button-1" type="button" aria-expanded="false">
                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden text-center lg:flex lg:items-center">
                    <ul class="items-center justify-end flex-1 pt-6 lg:pt-0 list-reset lg:flex">
                        <!--div>
                            <div class="relative text-left">
                                <button
                                    class="flex items-center gap-x-1 transition-all rounded-md outline-none focus:outline-none text-gray-700 dark:text-gray-300 hover:text-indigo-500 focus:text-indigo-500  inline-block px-4 py-2"
                                    id="headlessui-menu-button-3" type="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span>Browse</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"
                                        class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div-->
                        <div>
                            <a target="" rel=""
                                class="text-gray-700 dark:text-gray-300 rounded-md outline-none hover:text-indigo-500 focus:text-indigo-500  transition-all focus:outline-none inline-block px-5 py-2"
                                href="/customer-care">Customer Care</a>
                        </div>
                        <div>
                            <a target="" rel=""
                                class="text-gray-700 dark:text-gray-300 rounded-md outline-none hover:text-indigo-500 focus:text-indigo-500  transition-all focus:outline-none inline-block px-5 py-2"
                                href="/about-us">About Us</a>
                        </div>
                        <div>
                            <div class="relative text-left">
                                <button
                                    class="flex items-center gap-x-1 transition-all rounded-md outline-none focus:outline-none text-gray-700 dark:text-gray-300 hover:text-indigo-500   focus:text-indigo-500  inline-block px-4 py-2"
                                    id="headlessui-menu-button-4" type="button" aria-haspopup="true"
                                    aria-expanded="false"
                                    @click="toggleDropDown">
                                    <span>My Account</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true" class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div :class="`${dropdownClass} z-20 lg:w-56 origin-top-right lg:right-0 text-sm rounded-md lg:absolute focus:outline-none bg-white shadow-lg dark:bg-gray-800`"
                                    aria-labelledby="headlessui-menu-button-4" id="headlessui-menu-items-76" role="menu"
                                    tabindex="0">
                                    <div class="py-3" role="none">
                                        <div role="menuitem" tabindex="-1">
                                            <a target="_blank" rel="noopener" class="flex space-x-2 lg:space-x-4 items-center px-5 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-500 focus:text-indigo-500" href="/profile">
                                                <span> Profile</span>
                                            </a>
                                        </div>
                                        <div role="menuitem" tabindex="-1">
                                            <a target="" rel="" class="flex space-x-2 lg:space-x-4 items-center px-5 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-500 focus:text-indigo-500" href="/settings">
                                                <span> Settings</span>
                                            </a>
                                        </div>
                                        <div role="menuitem" tabindex="-1">
                                            <a target="" rel="" class="flex space-x-2 lg:space-x-4 items-center px-5 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-500 focus:text-indigo-500" href="/billing">
                                                <span> Billing</span>
                                            </a>
                                        </div>
                                        <div role="menuitem" tabindex="-1">
                                            <a target="" rel="" class="flex space-x-2 lg:space-x-4 items-center px-5 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-500 focus:text-indigo-500" href="/logout">
                                                <span> Log out</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="flex flex-col min-h-screen pt-24 px-5 md:px-10 2xl:px-64 w-full">
            <slot />
        </div>
        <div class="mt-10 py-6 text-center w-full">
            2022
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'

const dropdownClass = ref('hidden')
const toggleDropDown = () => {
    if (dropdownClass.value == 'hidden') {
        dropdownClass.value = '';
    } else {
        dropdownClass.value = 'hidden';
    }
}
</script>

<style>
</style>