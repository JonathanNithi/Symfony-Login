<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Project for OrangeHRM</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  </head>
  <body>
    <div id="container">
      <div id="header">
        <div class="content">
          <h1><a href="<?php echo url_for('job/index') ?>">
          </a></h1>
 
          <div id="sub_header">
            <div class="post">
              <h2>Logged in page</h2>
              <div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
 
      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <?php endif ?>
 
        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
        <?php endif ?>
 
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>

      <a href="<?php echo url_for('job_new') ?>">Post a Job</a>
      
      
      <div id="app">
          <ul class="menu">
        <div
          class="menu-indicator"
          :style="{ left: positionToMove, width: sliderWidth }"
        ></div>
        <li
          class="menu-item"
          v-for="link in links"
          :key="link.id"
          @click="sliderIndicator(link.id)"
          :ref="'menu-item_' + link.id"
        >
          <a
            :href="link.l"
            class="menu-link"
            :class="link.id === selectedIndex ? 'active' : null"
          >
            <i class="menu-icon" :class="link.icon"></i>
            <span>{{ link.text }}</span>
          </a>
        </li>
      </ul>

      </div>

      
 
      <div id="footer">
        <div class="content">
          <span class="symfony">
            
            powered by <a href="/">
            
            </a>
          </span>
          <ul>
            <li><a href="">About</a></li>
            <li class="feed"><a href="">Full feed</a></li>
            <li><a href="">API</a></li>
            <li class="last"><a href="">Affiliates</a></li>
          </ul>
        </div>
      </div>
    </div>
    
  </body>

  
  <script type="text/javascript">
        
        // const app = Vue.createApp({
        
        // });

        // app.mount("#app")

        const { createApp } = Vue

  createApp({
    data() {
    return {
      sliderPosition: 0,
      selectedElementWidth: 0,
      selectedIndex: 1,
      links: [
        {
          id: 1,
          icon: "fab fa-react",
          text: "React",
          l:"/frontend_dev.php",
        },
        {
          id: 2,
          icon: "fab fa-angular",
          text: "Angular",
          l:"",
        },
        {
          id: 3,
          icon: "fab fa-vuejs",
          text: "Vue",
          l:"job/show",
        },
        {
          id: 4,
          icon: "fab fa-html5",
          text: "HTML",
          l:"empdata",
        },
        {
          id: 5,
          icon: "fab fa-css3-alt",
          text: "CSS3",
          l:"leave",
        },
        {
          id: 6,
          icon: "fab fa-js",
          text: "Javascript",
          l:"leave",
        },
      ],
    };
  },
  methods: {
    sliderIndicator(id) {
      let el = this.$refs[`menu-item_${id}`][0];
      this.sliderPosition = el.offsetLeft;
      this.selectedElementWidth = el.offsetWidth;
      this.selectedIndex = id;
    },
  },
  computed: {
    positionToMove() {
      return this.sliderPosition + "px";
    },
    sliderWidth() {
      return this.selectedElementWidth + "px";
    },
  },
  }).mount('#app')

        // const app = new Vue({
        //   el: '#app',
        //   data(){
        //     return{
              
        //     }
        //   }
        // })
      </script>

<style>
:root {
  --active-color: #ffee93;
  --link-text-color: #f1faee;
  --menu-background-color: #1d3557;
  --active-background-color: #132238;
}
/* ul */
.menu {
  padding: 0;
  margin: 0;
  position: relative;
  background-color: var(--menu-background-color);
  display: inline-flex;
  border-radius: 4px;
  list-style-type: none;
  overflow: hidden;
}
/* li */
.menu-item {
  display: inline-flex;
}

/* a */
.menu-link {
  padding: 0.75rem 1rem;
  display: inline-flex;
  align-items: center;
  color: var(--link-text-color);
  text-decoration: none;
}

.menu-link:hover,
.menu-link.active {
  color: var(--active-color);
  background-color: var(--active-background-color);
}

/* icon */
.menu-icon {
  height: 1.5rem;
  width: 1.5rem;
  justify-content: center;
  align-items: center;
  display: inline-flex;
  margin-right: 0.2rem;
}
/* slider */
.menu-indicator {
  position: absolute;
  height: 0.25rem;
  background-color: var(--active-color);
  bottom: 0;
  left: 0;
  margin: auto;
  width: 3rem;
  transition: all ease 0.5s;
}
</style>

</html>