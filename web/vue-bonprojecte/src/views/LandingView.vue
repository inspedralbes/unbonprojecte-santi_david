<template>
    <div class="landing">
        <h1>Bienvenido amigo!</h1>
        <p>En un lugar de la Mancha...</p>
        <router-link to="/llistat">Ir a Llistat</router-link>
    </div>
</template>

<script>
export default {
    
}
</script>

<style scoped>
*{
    font-family: Arial, Helvetica, sans-serif;
    color: #ffffff;
}
.landing {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
    background-color: #1D1D1D;
}

h1 {
    font-size: 32px;
}

p {
    font-size: 18px;
}

router-link {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

router-link:hover {
    background-color: #0056b3;
}
</style>
