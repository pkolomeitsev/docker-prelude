<script setup lang="ts">
const version = import.meta.env.PACKAGE_VERSION
</script>
<template>
  <div class="credits">
    <h1 class="px-4 pt-4 font-bold leading-tight text-black">Credits:</h1>
    <ul class="max-w-md list-inside list-disc space-y-1 p-4 text-gray-500">
      <li>CSS framework: <a href="https://tailwindcss.com/" target="_blank">Tailwind CSS</a></li>
      <li>
        Base Theme:
        <a href="https://www.tailwindtoolbox.com/templates/landing-page" target="_blank">
          Landing Page
        </a>
      </li>
      <li>JS framework: <a href="https://vuejs.org/" target="_blank">Vue.js</a></li>
      <li>Components Styles: <a href="https://flowbite.com/" target="_blank">Flowbite</a></li>
      <li>
        Inspired by <a href="https://symfony.com/" target="_blank">Symfony 7</a> placeholder page UI
      </li>
    </ul>
    <p class="px-4 text-black">Version: {{ version }}</p>
  </div>
</template>
