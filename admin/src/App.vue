<script>

const API_URL = `http://publisher.loc/api/v1/book/categories`

export default {
  data() {
    return {
      categories: this.fetchData()
    };
  },
  methods: {
    async fetchData() {
      const url = `${API_URL}`
      this.categories = await ((await fetch(url))).json()
    }
  }
}

</script>

<template>

  <h1>Categories Book</h1>
  <ul>
    <li v-for="{id, title, slug} in categories.items">
      {{ id }} - {{ title }} - {{ slug }}
    </li>
  </ul>

</template>
