<template>
  <div>
    <input type="text" v-model="ingredient" @input="fetchIngredients" name="ingredientes[]" class="form-control" placeholder="Ingrediente">
    <ul>
      <li v-for="suggestion in suggestions" :key="suggestion.id" @click="selectIngredient(suggestion)">
        {{ suggestion.name }}
      </li>
    </ul>
  </div>
</template>
  
<script>
import axios from 'axios';
export default {
  data() {
    return {
      ingredient: '',
      suggestions: [],
    };
  },
  methods: {
    fetchIngredients() {
      if (this.ingredient.length > 2) {
        axios.get('/ingredients', {
          params: {
            query: this.ingredient
          }
        }).then(response => {
          this.suggestions = response.data;
        })
          .catch(error => {
            console.error(error);
          });
      } else {
        this.suggestions = [];
      }
    },
    selectIngredient(suggestion) {
      this.ingredient = suggestion.name;
      this.suggestions = [];
    },
  },
};
</script>
  