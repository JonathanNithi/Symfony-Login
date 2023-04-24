<?php use_helper('I18N') ?>

<div id="login" class="body">
  <h2 class="head-h2">{{ sub }}</h2>
  <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <table>
      <tbody>
        <?php echo $form ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">
            <input type="submit" value="<?php echo __('Sign in', null, 'sf_guard') ?>" />
          </td>
        </tr>
      </tfoot>
    </table>
  </form>   
</div>

<script type="text/javascript">

  var { createApp } = Vue

  const login = createApp({
    data() {
            return {
              heading: 'Orange HRM Assignment',
              sub: "SignIn with your username and password"
            }
          }
  })
  login.mount('#login')

</script>


<style scoped>
      .body {
        background-color: antiquewhite;
        font-family: "Trirong", serif;
        text-align: center;
        height: 88vh;
      }
      .head-h2{
        margin:0;
      }
      form{
        margin-left: 20px;
      }
      
</style>


