<template>
<div>
  <nav class="navbar navbar-expand-lg navbar-light nav-bar">
      <div>
          <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="three-doot svg-inline--fa fa-bars fa-w-14 fa-5x"><path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z" class=""></path></svg>         
        </div>

        <div class="logo">
              <img src="/favicon/3.png" alt="">
        </div>

        <!-- .....................................................................serce..................................................................... -->
        <div>
          <input placeholder="searce for product" class="serce" type="text">
          <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="serce-icon svg-inline--fa fa-search fa-w-16 fa-3x"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg>
        </div>

        <div class="help">
            <h6 class="mt-2">Help & more</h6>
        </div>


        <ul class="navbar-nav">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark"
               href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            >
              <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa icon="cog" fixed-width />
                {{ $t('settings') }}
              </router-link>

              <div class="dropdown-divider" />
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width />
                {{ $t('logout') }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li>
              <router-link :to="{ name: 'login' }" class="btn sing-in" >
                {{ $t('Sing In') }}
              </router-link>
            </li>
            <li >
              <router-link :to="{ name: 'register' }" class="btn sing-up">
                {{ $t('Sing Up') }}
              </router-link>
            </li>
          </template>
        </ul>
  </nav>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>

/* ......................................nav bar...................................... */
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
.sing-in{
    background: #842C74;
    margin-left: 15px;
    color: white;
    border-radius: 5px;

}
.sing-up{
    background: #D3517A;
    margin-left: 15px;
    color: white;
    border-radius: 5px;
  
}

/* .................................navbar edd............................................. */

/* .................................navbar................................................... */
.nav-bar{
    width: 1920px;
    height: 57px;
    background: #FDD670;
    position: fixed;
    margin-top: -25px;
    z-index: 2;

}
.three-doot{
    width: 27px;
    height: 27px;
    cursor: pointer;
    margin-left: 15px;
}
.logo{
    margin-left: 14px;
    margin-top: -4px;
    cursor: pointer;
}
.serce{
    width: 1325px;
    height: 42px;
    margin-left: 25px;
    border: none;
    outline: none;
    padding-left: 15px;
    border-radius: 5px;
}
.serce-icon{
    width: 22px;
    height: 30px;
    margin-left: -31px;
    cursor: pointer;

}
.help{
    margin-left: 31px;
    padding: 12px;
    border-left: 1px solid #b39d9d;
    border-right: 1px solid #b39d9d;
    cursor: pointer;
}
.help:hover{
  background:#EEB529;
}
/* ............................................navbar......................................... */
</style>
