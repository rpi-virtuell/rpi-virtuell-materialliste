<!-- open.php -->
<style>
    .material-result-flex-container{
        display: flex;

    }
    .material-result-content {
        background-color: #ffffff;
        padding: 20px;
        width:60%;
    }
    .material-result-content h3{
        font-size: larger;
    }
    .material-result-image{
        background: #ededed;
        width: 40%;

    }

    .material-result-image img{
        min-width: 250px;
    }
    material-result-content{

    }
    @media only screen and (max-width: 600px) {
        .material-result-flex-container{
            display: block;

        }
        .material-result-content {
            background-color: #ffffff;
            padding: 2px;
        }
        .material-result-flex-col{
            width: 100%;
        }
        [data-structure*="wide"] [class*="_inner-container"] > :not(.alignfull) {
            width: unset;
        }
    }


</style>
