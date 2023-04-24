<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
  <title>Assignment for OrangeHRM</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  </head>
  <body>   
    

    <div id="layout">
      <div class="topic">
        <h1 class="top-h">{{ heading }}</h1>
      </div>
      <?php if ($sf_user->isAuthenticated()): ?>
      <div id="index">
        <div id="menu">
          <nav>
            <ul class="menu">
              <div
                class="menu-indicator"
                :style="{ left: positionToMove, width: sliderWidth }"
              ></div>
              <li
              v-for="link in links"
              class="menu-item"
              @click="sliderIndicator(link.id)"
              :key="link.id"
              :class="link.id === selectedIndex ? 'active' : null"
              :ref="'menu-item_' + link.id"
              >
                <a
                class="menu-link"
                :href="link.l"   
                >
                  <span>{{ link.text }}</span>
                  <i class="menu-icon" :class="link.icon"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <?php endif ?>
    </div>

    <?php echo $sf_content ?>
       
    <?php include_javascripts() ?>
  </body>
  <script type="text/javascript">

        var { createApp } = Vue

        const layout = createApp({
          data() {
            return {
              heading: 'Orange HRM Assignment',
              sub: "sign in",
              sliderPosition: 0,
              selectedElementWidth: 0,
              selectedIndex: 0,
              links: [
                {
                  id: 1,
                  text: "My Details",
                  l:"/backend_dev.php",
                },
                {
                  id: 2,
                  text: "Employee Data",
                  l:"/backend_dev.php/empdata",
                },
                {
                  id: 3,
                  text: "Leave",
                  l:"/backend_dev.php/leave",
                },
                {
                  id: 4,
                  text: "Sign Out",
                  l:"/backend_dev.php/logout",
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
        }
      )
        layout.mount('#layout')

  </script>
      <style scoped>
      .topic {
        background-color: orange;
        font-family: "Trirong", serif;
        text-align: center;
      }
      .top-h{
        margin:0;
      }
      * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

#menu{
  background-color:#FF6347;
}

nav ul{
  list-style-type: none;
  margin-left: 10px;
}

nav ul li{
  display: inline-block;
  padding: 10px;
}

nav ul li:hover{
  background-color: #D75341;
}

nav ul li a{
  text-decoration: none;
  color: black;
  font-family: "Trirong", serif;
}

.menu-item.active {
  background-color: #D75341;
}
    </style>
</html>
