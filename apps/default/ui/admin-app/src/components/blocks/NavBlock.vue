<script setup lang="ts">
import { LocalStorageHelper } from '@/models/helper/LocalStorageHelper'
import { OldUISwitcher } from '@/models/helper/OldUISwitcher'

const appConfig = LocalStorageHelper.getItem('config')
const appName = appConfig.appName
const gitHubLink = appConfig.gitHubLink

function switchToOldUI() {
  OldUISwitcher.switchToOld()
}
</script>
<template>
  <!--Nav-->
  <nav id="header" class="fixed top-0 z-30 w-full text-white">
    <div class="container mx-auto mt-0 flex w-full flex-wrap items-center justify-between py-2">
      <div class="flex items-center pl-4">
        <a class="text-2xl font-bold text-white no-underline hover:no-underline" href="/">
          {{ appName }}
        </a>
      </div>
      <div class="block pr-4 lg:hidden">
        <button
          id="nav-toggle"
          class="focus:shadow-outline flex transform items-center p-1 text-gray-800 transition duration-300 ease-in-out hover:scale-105 hover:text-gray-900 focus:outline-none"
        >
          <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div
        class="z-20 mt-2 hidden w-full flex-grow bg-white p-4 text-black lg:mt-0 lg:flex lg:w-auto lg:items-center lg:bg-transparent lg:p-0"
        id="nav-content"
      >
        <ul class="list-reset flex-1 items-center justify-end lg:flex">
          <li class="mr-3">
            <a
              class="hover:text-underline inline-block px-4 py-2 text-black no-underline hover:text-gray-800"
              href="#"
              @click="switchToOldUI"
            >
              Old UI
            </a>
          </li>
          <li class="mr-3">
            <a
              class="hover:text-underline inline-block px-4 py-2 text-black no-underline hover:text-gray-800"
              :href="gitHubLink"
              target="_blank"
            >
              <img src="../../assets/img/github.png" class="mb-1 inline-block h-4" alt="GitHub" />
              GitHub
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- <hr class="my-0 border-b border-gray-100 py-0 opacity-25" /> -->
  </nav>
</template>
