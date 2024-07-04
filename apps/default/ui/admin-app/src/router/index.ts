import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '@/components/HomePage.vue'
import TestEmail from '@/components/TestEmail.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomePage
    },
    {
      path: '/test-email',
      name: 'testEmail',
      component: TestEmail
    },
    {
      path: '/phpinfo',
      name: 'phpinfo',
      component: () => import('@/components/PhpInfo.vue')
    }
  ]
})

export default router
