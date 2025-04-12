<script setup lang="ts">
import MouseCursor from "@/components/MouseCursor.vue";
import BackToTop from "@/components/BackToTop.vue";
import SearchBoxPopup from "@/components/SearchBoxPopup.vue";
import MobileMenu from "@/components/MobileMenu.vue";
import FooterSectionOne from "@/components/footer/FooterSectionOne.vue";
import HeaderOne from "@/components/header/HeaderOne.vue";
import HeaderTwo from "@/components/header/HeaderTwo.vue";
import HeaderThree from "@/components/header/HeaderThree.vue";

//const route = useRoute();
</script>

<template>
  <!--===== Mouse Cursor Start =====-->
  <MouseCursor/>
  <!--===== Mouse Cursor End =====-->

  <!--===== Back To Top Start =====-->
  <BackToTop/>
  <!--===== Back To Top End =====-->

  <!--===== Search Box Popup Start =====-->
  <SearchBoxPopup/>
  <!--===== Search Box Popup End =====-->

  <!--===== Sidemenu Start =====-->
  <SidebarMenu v-if="route.name === 'home-2' || route.name === 'home-3'" />
  <!--===== Sidemenu End =====-->

  <!--===== Mobilemenu    S T A R T =====-->
  <MobileMenu/>
  <!--===== Mobilemenu    END =====-->

  <!--===== Header Section    S T A R T =====-->
  <template v-if="route.name === 'home-2'">
    <HeaderTwo/>
  </template>
  <template v-if="route.name === 'home-3'">
    <HeaderThree/>
  </template>
  <template v-if="route.name !== 'home-2' && route.name !== 'home-3'">
    <HeaderOne/>
  </template>
  <!--===== Header Section    END =====-->

  <slot/>

  <!--===== Footer Section    S T A R T =====-->
  <FooterSectionOne/>
  <!--===== Footer Section    END =====-->
</template>

<style scoped>

</style>