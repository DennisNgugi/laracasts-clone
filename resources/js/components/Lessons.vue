<template>
  <div class="container">
    <h1 class="text-center">
      <button type="button" @click="createNewLesson()" class="btn btn-primary">Create new lesson</button>
    </h1>
    <ul class="list-group">
      <li class="list-group-item" v-for="lesson ,key in lessons">
      <p> {{lesson.title}}</p>
      <p class="float-right">
        <button type="button" class="btn btn-primary btn-sm" @click="editLesson(lesson)" >Edit</button>
        <button type="button" class="btn btn-danger btn-sm" @click="deleteLesson(lesson.id,key)" >Delete</button>
      </p>
      </li>
    </ul>
    <createLesson/>
  </div>
</template>

<script>
import createLesson from './children/CreateLesson.vue'
export default {
  props: ['default_lessons','series_id'],
  components:{
    createLesson
  },
  mounted(){
    this.$on('lesson_created',(lesson)=>{
        this.lessons.push(lesson)
    })
    this.$on('lesson_updated',(lesson)=>{
        let lessonIndex = this.lessons.findIndex(l =>{
          return lesson.id == l.id
        })
        this.lessons.splice(lessonIndex,1,lesson)
    })
  },
  data(){
    return {
      lessons:JSON.parse(this.default_lessons)
    }
  },
  computed:{

  },
  methods:{
    createNewLesson(){
      this.$emit('create_new_lesson',this.series_id)
    },
    deleteLesson(id,key){
      axios.delete(`/admin/${this.series_id}/lessons/${id}`).
      then(res => {
          this.lessons.splice(key,1)
      }).catch(error=>{
        console.log(error)
      })
    },
    editLesson(lesson){
      let seriesId = this.series_id
      this.$emit('edit_lesson',lesson,seriesId)
    }
  }
}
</script>

<style lang="css" scoped>
</style>
