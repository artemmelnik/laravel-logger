<template>
  <div>
    <card>
      {{ $t('you_are_logged_in') }}
    </card>
    <br>
    <card :title="$t('home')">
      <table class="table">
        <tr v-for="log in logs.data">
          <td>
            {{ log.host }}
            <div class="text-muted">{{ log.written_at }}</div>
          </td>
          <td>
            {{ log.request }}
            <div class="text-muted">{{ log.ua }}</div>
          </td>
          <td>{{ log.status }}</td>
        </tr>
      </table>
    </card>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    middleware: 'auth',

    metaInfo () {
      return { title: this.$t('home') }
    },

    data() {
      return {
        logs: []
      }
    },

    mounted() {
      this.loadLogs()
    },

    methods: {
      loadLogs() {
        axios.get(`/api/logs`).then(result => {
          console.log(result.data)

          this.logs = result.data
        })
      }
    }
  }
</script>
