<script setup lang="ts">
import {menuItems} from "@/data/menus";

const route = useRoute();

// Function to check if a menu item is active
const isActive = (link: string) => {
  return route.path === link;
};
</script>

<template>
  <ul>
    <!-- Loop through menu items -->
    <li
        v-for="(item, index) in menuItems"
        :key="index"
        :class="{ 'menu-item-has-children': item.subMenu }"
    >
      <!-- Main menu item -->
      <NuxtLink
          :to="item.link"
          :class="{ active: isActive(item.link) }"
      >
        {{ item.title }}
        <!-- Dropdown icon for items with submenus -->
        <span v-if="item.subMenu" class="dropdown-icon">
          <img
              v-if="route.name === 'index'"
              class="svg"
              src="@/assets/images/icon/dropdown-icon-white.svg"
              alt="icon"
          />
          <img
              v-else
              class="svg"
              src="@/assets/images/icon/dropdown-icon.svg"
              alt="icon"
          />
        </span>
      </NuxtLink>

      <!-- Submenu -->
      <ul v-if="item.subMenu" class="sub-menu">
        <li v-for="(subItem, subIndex) in item.subMenu" :key="subIndex">
          <NuxtLink :to="subItem.link" :class="{ active: isActive(subItem.link) }">
            {{ subItem.title }}
          </NuxtLink>
        </li>
      </ul>
    </li>
  </ul>
</template>

<style scoped>

</style>