<script setup lang="ts">
import { ref } from "vue";
import { menuItems } from "@/data/menus";
import { useRouter, useRoute } from 'vue-router'

const route = useRoute();
//const settingStore = useSettingStore();

// Track which menu items are open
const openMenus = ref<number[]>([]);

const isActive = (link: string) => route.path === link;

// Toggle the submenu
const toggleMenu = (index: number) => {
  if (openMenus.value.includes(index)) {
    openMenus.value = openMenus.value.filter((i) => i !== index);
  } else {
    openMenus.value.push(index);
  }
};

// Check if a menu is open
const isOpen = (index: number) => openMenus.value.includes(index);
</script>

<template>
  <div class="global-menu-wrapper onepage-nav" :class="{ 'global-body-visible': false }">
    <div class="global-menu-area text-center">
      <button class="global-menu-toggle" @click="settingStore.toggleMobileMenu"><i class="fal fa-times"></i></button>
      <div class="mobile-logo">
        <NuxtLink to="/">
          <img src="assets/images/logo/logo-white.svg" alt="logo">
        </NuxtLink>
      </div>
      <nav class="global-mobile-menu">
        <ul>
          <li
              v-for="(item, index) in menuItems"
              :key="index"
              :class="{ 'menu-item-has-children': item.subMenu, 'global-active': isOpen(index) }"
          >
            <div class="menu-item-wrapper">
              <a
                  v-if="item.subMenu"
                  role="button"
                  :class="{ active: isActive(item.link) }"
                  @click="toggleMenu(index)"
              >
                {{ item.title }}
              </a>
              <NuxtLink
                  v-else
                  :to="item.link"
                  :class="{ active: isActive(item.link) }"
              >
                {{ item.title }}
              </NuxtLink>
            </div>
            <!-- Submenu -->
            <ul v-show="isOpen(index)" class="sub-menu">
              <li v-for="(subItem, subIndex) in item.subMenu" :key="subIndex">
                <NuxtLink :to="subItem.link" :class="{ active: isActive(subItem.link) }">
                  {{ subItem.title }}
                </NuxtLink>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<style scoped>

</style>