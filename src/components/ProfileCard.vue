<script setup>
import { ref, onMounted } from 'vue'

const theme = ref('pink')
const userData = {
  username: 'nicolee.palomino',
  jobTitle: 'Desarrolladora de Software | Ciencia de Datos | Web Scraping | Datos Deportivos',
  profileImage: 'https://i.postimg.cc/26jJNnbN/my-photo.png'
}

const links = [
  { title: 'Mi Portafolio', url: 'https://nicole-palomino.github.io/portafolio/', icon: '<i class="fa-solid fa-address-card"></i>' },
  { title: 'Mi Blog', url: 'https://devfut.blogspot.com/', icon: '<i class="fa-brands fa-blogger"></i>' },
  { title: 'Descarga Mi CV', url: 'https://drive.google.com/uc?export=download&id=1YVJKkCtVtxK1e2yoAv9x_RDIU17KEREi', icon: '<i class="fa-regular fa-file"></i>' }
]

const socialLinks = [
  { platform: 'Twitter', url: 'https://x.com/aless_palomino', icon: '<i class="fa-brands fa-x-twitter"></i>' },
  { platform: 'Instagram', url: 'https://www.instagram.com/nicolee.palomino/', icon: '<i class="fa-brands fa-instagram"></i>' },
  { platform: 'GitHub', url: 'https://github.com/Nicole-Palomino', icon: '<i class="fa-brands fa-github"></i>' },
  { platform: 'LinkedIn', url: 'https://www.linkedin.com/in/nicole-palomino-alvarado/', icon: '<i class="fa-brands fa-linkedin"></i>' },
  { platform: 'Tik Tok', url: 'https://www.tiktok.com/@vibe_trivia', icon: '<i class="fa-brands fa-tiktok"></i>' }
]

const themes = ['pink', 'blue', 'green', 'orange', 'dark']

const emit = defineEmits(['themeChange'])

const changeTheme = (newTheme) => {
  theme.value = newTheme
  emit('themeChange', newTheme)
}

const isVisible = ref(false)
// const isVisible = ref(false)

onMounted(() => {
  setTimeout(() => {
    isVisible.value = true
  }, 300)
})
</script>

<template>
  <div
    class="profile-card"
    :class="[theme, { 'visible': isVisible }]"
    >
    <div class="profile-content">
      <div class="avatar-container">
        <img :src="userData.profileImage" :alt="`Foto de perfil de ${userData.username}`" class="avatar">
      </div>

      <h2 class="username">@{{ userData.username }}</h2>
      <p class="job-title">{{ userData.jobTitle }}</p>

      <div class="theme-selector">
        <p>Elige un tema:</p>
        <div class="theme-colors">
          <button
            v-for="t in themes"
            :key="t"
            :class="['theme-color', t, { active: theme === t }]"
            @click="changeTheme(t)"
          ></button>
        </div>
      </div>

      <div class="links-container">
        <a
          v-for="link in links"
          :key="link.title"
          :href="link.url"
          class="link-button"
          target="_blank"
        >
          <div class="link-title">
            <span class="link-icon" v-html="link.icon"></span>
            <span>{{ link.title }}</span>
          </div>
          <span class="external-icon">↗</span>
        </a>
      </div>

      <div class="social-icons">
        <a
          v-for="social in socialLinks"
          :key="social.platform"
          :href="social.url"
          class="social-link"
          :title="social.platform"
          target="_blank"
        >
          <span v-html="social.icon"></span>
        </a>
      </div>
    </div>
  </div>
</template>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.profile-card {
  background-color: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 16px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 450px;
  padding: 32px;
  transform: translateY(20px);
  opacity: 0;
  transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  position: relative;
  overflow: hidden;

}

.profile-card.visible {
  transform: translateY(-10px);
  opacity: 1;
}

.profile-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 5px;
  background: var(--theme-primary);
  transition: all 0.3s ease;
}

.profile-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
}

.profile-card:hover::before {
  height: 8px;
}

.profile-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  z-index: 1;
}

.avatar-container {
  position: relative;
  width: 120px;
  height: 120px;
  margin-bottom: 24px;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
  transition: all 0.4s ease;
}

.avatar-container::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border: 3px solid var(--theme-primary);
  border-radius: 50%;
  opacity: 0;
  transition: all 0.3s ease;
}

.avatar-container:hover {
  transform: scale(1.05) rotate(2deg);
}

.avatar-container:hover::after {
  opacity: 1;
  transform: scale(1.1);
}

.avatar {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: all 0.3s ease;
}

.username {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 4px;
  background: linear-gradient(45deg, var(--theme-primary), #000);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  position: relative;
  transition: all 0.3s ease;
}

.username::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 2px;
  background: var(--theme-primary);
  transition: width 0.3s ease;
}

.profile-content:hover .username::after {
  width: 100%;
}

.job-title {
  color: #4B5563;
  margin-bottom: 28px;
  text-align: center;
  font-weight: 500;
  transition: all 0.3s ease;
}

.theme-selector {
  margin-bottom: 32px;
  text-align: center;
  width: 100%;
}

.theme-selector p {
  color: #4B5563;
  margin-bottom: 12px;
  font-size: 14px;
  font-weight: 500;
}

.theme-colors {
  display: flex;
  gap: 12px;
  justify-content: center;
}

.theme-color {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
}

.theme-color::after {
  content: '';
  position: absolute;
  top: -4px;
  left: -4px;
  right: -4px;
  bottom: -4px;
  border-radius: 50%;
  border: 2px solid transparent;
  transition: all 0.3s ease;
}

.theme-color:hover {
  transform: scale(1.15) translateY(-2px);
}

.theme-color.active::after {
  border-color: var(--theme-primary);
}

.theme-color.pink { background-color: #ec4899; }
.theme-color.blue { background-color: #3b82f6; }
.theme-color.green { background-color: #10b981; }
.theme-color.orange { background-color: #f97316; }
.theme-color.dark { background-color: #1f2937; }

.links-container {
  width: 100%;
  margin-bottom: 12px;
}

.link-button {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 20px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  margin-bottom: 14px;
  text-decoration: none;
  color: #111827;
  font-weight: 500;
  background-color: white;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  z-index: 1;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  opacity: 0;
  transform: translateX(-20px);
  animation: slideIn 0.5s ease forwards;
}

.link-button::before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  height: 0;
  background-color: var(--theme-hover);
  z-index: -1;
  transition: height 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}

.link-button:hover {
  transform: translateX(6px);
  border-color: var(--theme-primary);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.link-button:hover::before {
  height: 100%;
}

.link-button .link-title {
  display: flex;
  align-items: center;
  gap: 10px;
}

.link-icon, .icon {
  width: 20px;
  height: 20px;
  color: var(--theme-primary);
  transition: all 0.3s ease;
}

.link-button:hover .link-icon,
.link-button:hover .icon {
  transform: scale(1.15);
}

.social-icons {
  display: flex;
  margin-top: 32px;
  gap: 28px;
}

.social-link {
  color: #6B7280;
  width: 22px;
  height: 22px;
  position: relative;
  transition: all 0.3s ease;
  opacity: 0;
  transform: translateY(15px);
  animation: fadeUp 0.5s ease forwards;
}

.social-link::after {
  content: '';
  position: absolute;
  top: -8px;
  left: -8px;
  right: -8px;
  bottom: -8px;
  background-color: var(--theme-hover);
  border-radius: 50%;
  z-index: -1;
  transform: scale(0);
  transition: transform 0.3s ease;
}

.social-link:hover {
  transform: translateY(-4px);
  color: var(--theme-primary);
}

.social-link:hover::after {
  transform: scale(1);
}

.social-icon {
  width: 22px;
  height: 22px;
}

/* Temas con hover effect */
.profile-card.pink { --theme-primary: #ec4899; --theme-hover: rgba(236, 72, 153, 0.1); }
.profile-card.blue { --theme-primary: #3b82f6; --theme-hover: rgba(59, 130, 246, 0.1); }
.profile-card.green { --theme-primary: #10b981; --theme-hover: rgba(16, 185, 129, 0.1); }
.profile-card.orange { --theme-primary: #f97316; --theme-hover: rgba(249, 115, 22, 0.1); }
.profile-card.dark { --theme-primary: #1f2937; --theme-hover: rgba(31, 41, 55, 0.1); }

@keyframes slideIn {
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.link-button:nth-child(1) { animation-delay: 0.3s; }
.link-button:nth-child(2) { animation-delay: 0.4s; }
.link-button:nth-child(3) { animation-delay: 0.5s; }

.social-link:nth-child(1) { animation-delay: 0.7s; }
.social-link:nth-child(2) { animation-delay: 0.8s; }
.social-link:nth-child(3) { animation-delay: 0.9s; }
.social-link:nth-child(4) { animation-delay: 1s; }
</style>
