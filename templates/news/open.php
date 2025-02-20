<!-- open.php -->
<style>
    .rpi-materialiste {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
    }
    .rpi-materialiste .container {
        flex: 1 1 calc(33.333% - 20px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        transition: transform 0.3s;
    }


    @media screen and (max-width: 1024px) {
        .rpi-materialiste .container {
            flex: 1 1 calc(50% - 10px);
        }
    }
    @media screen and (max-width: 768px) {
        .rpi-materialiste .container {
            flex: 1 1 100%;
        }
    }

    h3.subtitle {
        font-size: 1.1rem;
        font-weight: bold;
        padding: 15px;
        margin: 0;
        border-bottom: 1px solid #ddd;
    }
    .container .row {
        margin: 0 5px 5px;
    }
    .container .subtitle {
        font-size: 20px;
        font-weight: bold;
    }
    article:hover {
        transform: translateY(-5px);
    }
    article .entry-row {
        font-size: 1.25rem;
        font-weight: bold;
        padding: 5px;
        border-bottom: 1px solid #ddd;
        background-color: #f9f9f9;
    }

    article .metadaten {
        font-size: 0.75rem;
        padding: 10px 15px;
        background-color: #f4f4f4;
        border-top: 1px solid #ddd;
        color: #666;
    }
    article .mehr-link {
        display: block;
        text-align: center;
        padding: 10px 0;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 0 0 8px 8px;
        transition: background-color 0.3s;
    }
    article .mehr-link:hover {
        background-color: #0056b3;
    }
    article .vpic img {
        width: 100%;
    }
    article .vpic {
        display: block;
        max-height: 200px;
        overflow: hidden;
        border: 1px solid #ddd;
        margin-bottom: 10px;
    }
    article .info {
        font-size: 0.875rem;
        color: #333;
        line-height: 1.2rem;
        max-height: 150px;
        overflow: auto;
    }

    article .short-description {
        font-size: 0.875rem;
        color: #333;
    }

</style>
<div class="rpi-materialiste">
