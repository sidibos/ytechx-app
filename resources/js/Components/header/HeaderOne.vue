<script setup lang="ts">
import HeaderMenu from "@/components/header/HeaderMenu.vue";
const settingStore = useSettingStore();
const { isSticky } = useStickyMenu();
const route = useRoute();
</script>

<template>
  <header class="global-header header-layout" :class="{'header-bg-1': route.name === 'index'}">
    <div class="sticky-wrapper2" :class="{sticky: isSticky}">
      <!--=====Main Menu Area -->
      <div class="container">
        <div class="menu-area">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <div class="header-logo">
                <NuxtLink to='/'>
                  <img v-if="route.name === 'index'" src="@/assets/images/logo/logo-white.svg " class="svg" alt="logo">
                  <img v-else src="@/assets/images/logo/logo-dark.svg " class="svg" alt="logo">
                </NuxtLink>
              </div>
            </div>
            <div class="col-auto">
              <nav class="pr-380 d-none d-xl-inline-block" :class="[route.name === 'index' ? 'main-menu2' : 'main-menu']">
                <HeaderMenu />
              </nav>
              <div class="header-button d-flex d-xl-none">
                <button type="button" class="global-menu-toggle sidebar-btn" @click="settingStore.toggleMobileMenu">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </div>
            </div>
            <div class="col-auto d-none d-xl-block">
              <div class="header-button">
                <button type="button" class="search-icon2 searchBoxToggler" @click="settingStore.openSearchModal">
                  <i class="far fa-search"></i>
                </button>
                <div class="btn-wrapper">
                  <NuxtLink class="theme-btn style2" to="/contact">Get Started</NuxtLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>

</style>