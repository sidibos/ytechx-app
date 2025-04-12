<script setup lang="ts">
import HeaderTop from "@/components/header/HeaderTop.vue";
import HeaderMenu from "@/components/header/HeaderMenu.vue";
const settingStore = useSettingStore();
const { isSticky } = useStickyMenu();
</script>

<template>
  <HeaderTop />
  <header class="global-header header-layout header-bg-1 header-border fix-header">
    <div class="sticky-wrapper" :class="{sticky: isSticky}">
      <!--=====Main Menu Area -->
      <div class="container">
        <div class="menu-area">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <div class="header-logo">
                <NuxtLink to='/'>
                  <img src="@/assets/images/logo/logo-dark.svg" alt="logo">
                </NuxtLink>
              </div>
            </div>
            <div class="col-auto">
              <nav class="pl-500 main-menu d-none d-xl-inline-block">
                <HeaderMenu />
              </nav>
              <div class="header-button d-flex d-xl-none">
                <button type="button" class="global-menu-toggle sidebar-btn" @click="settingStore.openSearchModal">
                  <i class="fa-solid fa-bars"></i>
                </button>
              </div>
            </div>
            <div class="col-auto d-none d-xl-block">
              <div class="header-button">
                <button type="button" class="search-icon searchBoxToggler" @click="settingStore.openSearchModal">
                  <i class="far fa-search"></i>
                </button>
                <button type="button" class="simple-icon sideMenuInfo sidebar-btn style3" @click="settingStore.openSidebarMenu">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
                </button>
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