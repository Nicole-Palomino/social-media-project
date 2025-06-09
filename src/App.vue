<script setup>
  import ProfileCard from './components/ProfileCard.vue'
  import { ref } from 'vue'

  const gradients = {
    pink: 'linear-gradient(135deg, #ff69b4 0%, #8b0a50 100%)',
    blue: 'linear-gradient(135deg, #00bfff 0%, #00008b 100%)',
    green: 'linear-gradient(135deg, #10b981 0%, #006400 100%)',
    orange: 'linear-gradient(135deg, #ffa500 0%, #8b4500 100%)',
    dark: 'linear-gradient(135deg, #4a4a4a 0%, #000000 100%)'
  }

  const currentTheme = ref('pink')

  const handleThemeChange = (theme) => {
    currentTheme.value = theme
    document.body.style.background = gradients[theme]
  }
</script>

<template>
  <main>
    <ProfileCard @theme-change="handleThemeChange" />
  </main>
</template>

<style>
  body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #ff69b4 0%, #8b0a50 100%);
    transition: background 0.3s ease;
  }

  main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
  }
</style>
