<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { LocalStorageHelper } from '@/models/helper/LocalStorageHelper'
import { OldUISwitcher } from '@/models/helper/OldUISwitcher'
import CreditsBlock from './CreditsBlock.vue'

const appConfig = LocalStorageHelper.getItem('config')
const appName = appConfig.appName
const gitHubLink = appConfig.gitHubLink
const displayMobileMenu = ref(false)

function switchToOldUI() {
  OldUISwitcher.switchToOld()
}

function toggleMobileMenu() {
  displayMobileMenu.value = !displayMobileMenu.value
  document.getElementsByTagName('body')[0].style.overflow = displayMobileMenu.value
    ? 'hidden'
    : 'visible'
}

onMounted(() => {
  var scrollpos = window.scrollY
  const header = document.getElementById('header')

  document.addEventListener('scroll', () => {
    scrollpos = window.scrollY
    if (header && scrollpos > 10) {
      header.classList.add('scrollApp')
    } else {
      header.classList.remove('scrollApp')
    }
  })
})
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
          @click="toggleMobileMenu"
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
    <div
      class="mobile-menu container fixed bg-white lg:hidden"
      :class="{ hidden: !displayMobileMenu }"
    >
      <ul class="list-reset flex-1 items-center justify-end lg:flex">
        <li class="mr-3">
          <a
            class="inline-flex items-center px-4 py-2 text-black no-underline hover:text-gray-800"
            href="#"
            @click="switchToOldUI"
          >
            Old UI
            <svg
              class="ms-2 h-4 w-4 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9"
              />
            </svg>
          </a>
        </li>
        <li class="mr-3">
          <a
            class="inline-flex items-center px-4 py-2 text-black no-underline hover:text-gray-800"
            :href="gitHubLink"
            target="_blank"
          >
            <img src="../../assets/img/github.png" class="mr-1 inline-block h-4" alt="GitHub" />
            GitHub
          </a>
        </li>
      </ul>
      <hr class="mx-4" />
      <CreditsBlock class="bg-confetti-animated" />
    </div>
  </nav>
</template>
