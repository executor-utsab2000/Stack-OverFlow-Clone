<style>
    .chatBotIcon {
        position: fixed;
        right: 30px;
        bottom: 60px;
        padding: 0.5rem 0.6rem;
        background-color: red;
        color: yellow;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        border-radius: 50%;
    }

    .chatBotIcon i {
        font-size: 1.3rem;
    }

    .chatBot {
        z-index: 11;
        background-color: azure;
        width: 17rem;
        position: fixed;
        right: 40px;
        bottom: 100px;
        border-radius: 10px;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
    }

    .chatBot .header {
        display: flex;
        justify-content: space-between;
        border-radius: 10px;
        color: yellow;
        font-weight: 800;
        letter-spacing: 1px;
        font-size: 0.7rem;
        padding: 0.3rem 1rem;
        background-color: blue;
        margin-bottom: 1rem;
    }

    .closeChat i {
        font-size: 0.7rem;
        color: yellow;
    }



    .chatBot .chatBox {
        height: 20rem;
        font-size: 0.7rem;
        font-weight: 600;
        list-style: none;
        overflow-y: scroll;
        padding: 0.5rem;
    }

    .chatBox::-webkit-scrollbar {
        display: none;
    }

    .chatBox .chat {
        display: flex;
    }

    .chat p {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        background-color: blue;
        padding: 0.3rem 1rem;
        width: 75%;
        color: antiquewhite;
        border-radius: 10px;
    }

    .chatBotMsg p {
        background-color: gray;
        padding: 0.4rem 1rem;
        color: black;
        border-radius: 10px;
    }

    .userMsg {
        justify-content: flex-end;
    }

    .userMsg table {
        cursor: pointer;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        background-color: blue;
        color: antiquewhite;
        border-radius: 10px;
        width: 40%;
        margin-bottom: 1rem;
    }

    .userMsg table td {
        padding: 0.3rem;
        text-align: center;
    }

    .userMsg table tr:first-of-type {
        border-bottom: 3px solid yellow;
    }

    .chatInput {
        padding: 0.3rem;
        border-top: 1px solid black;
        display: flex;
    }

    .chatInput textarea {
        width: 90%;
        border-radius: 10px;
        height: 3rem;
        margin-right: 0.3rem;
        resize: none;
        font-weight: 600;
        font-size: 0.7rem;
        padding: 0.3rem;
    }

    .chatInput button {
        font-weight: 700;
        height: 2.5rem;
        margin: auto;
        border: 0;
        background-color: blueviolet;
        color: yellow;
        border-radius: 10px;
        padding: 0.5rem;
    }
</style>

<div class="chatBotIcon">
    <i><i class="fa-solid fa-robot"></i></i>
</div>

<div class="chatBot d-none">
    <div class="header">
        <span class="my-auto">Add Topic ChatBot</span>
        <button class="btn closeChat"><i class="fa-solid fa-x"></i></button>
    </div>
    <ul class="chatBox">
        <li class="chat chatBotMsg">
            <p>Do you want to add Topic ? Answer in Yes or No</p>
        </li>
        <!-- <li class="chat userMsg">
            <p>Yes</p>
          </li> -->
        <li class="chat userMsg">
            <table>
                <tr>
                    <td class="yesNoChat">Yes</td>
                </tr>
                <tr>
                    <td class="yesNoChat">No</td>
                </tr>
            </table>
        </li>
    </ul>
    <div class="chatInput">
        <textarea name="" id="chatInputUser" disabled
            placeholder="Initially its disabled .. we will enable it when its necessary."></textarea>
        <button id="chatSend">>></button>
    </div>
</div>



<script>



    const chatSend = document.querySelector("#chatSend");
    let chatInputUser = document.querySelector("#chatInputUser");
    const chatBox = document.querySelector(".chatBox");
    const chatBot = document.querySelector(".chatBot");
    const chatBotIcon = document.querySelector(".chatBotIcon");
    const closeChat = document.querySelector(".closeChat");

    const allLanguages = [
        // programming languages
        'laravel',
        "javascript",
        "python",
        "java",
        "c++",
        "c#",
        "ruby",
        "php",
        "swift",
        "go",
        "rust",
        "typescript",
        "kotlin",
        "perl",
        "r",
        "matlab",
        "lua",
        "dart",
        "haskell",
        "groovy",
        "clojure",
        "f#",
        "ada",
        "fortran",
        "cobol",
        "objective-c",
        "scala",
        "scheme",
        "lisp",
        "elixir",
        "erlang",
        "julia",
        "tcl",
        "d",
        "pascal",
        "assembly (x86)",
        "assembly (arm)",
        "vhdl",
        "verilog",
        "smalltalk",
        "scratch",
        "logo",
        "pl/sql",
        "sql",
        "bash",
        "powershell",
        "awk",
        "sed",
        "prolog",
        "racket",
        "nim",

        // markup languages
        "html",
        "xml",
        "xhtml",
        "markdown",
        "latex",
        "sgml",
        "mathml",
        "svg",
        "docbook",
        "kml",
        "xaml",
        "haml",
        "pug (formerly jade)",
        "bbcode",
        "wikitext",
        "rss",
        "atom",
        "gml (gamemaker language)",
        "vrml",
        "xbrl",
        "gherkin",
        "jinja2",
        "jsx",
        "php (when used in template files)",
        "ejs (embedded javascript)",
        "hcl (hashicorp configuration language)",
        "rtf (rich text format)",
        "rdoc",
        "creole",
        "textile",
        "dita",
        "fo (xsl formatting objects)",
        "ampl",
        "rmarkdown",
        "handlebars",
        "liquid",
        "asciidoc",
        "uiml (user interface markup language)",
        "yang",
        "tmx (translation memory exchange)",
        "maml (microsoft assistance markup language)",
        "xul (xml user interface language)",
        "gdf (graph data format)",
        "collada",
        "rdfa (resource description framework in attributes)",
        "s1000d",
        "hjson",
        "toml",
        "bibtex",
        "apache velocity template language", // style sheet languages

        "css",
        "less",
        "sass (syntactically awesome stylesheets)",
        "scss (sassy css)",
        "stylus",
        "postcss",
        "xsl (extensible stylesheet language)",
        "xslt (xsl transformations)",
        "jss (javascript style sheets)",
        "css-in-js (various libraries such as styled-components)",
        "compass (sass framework)",
        "bootstrap (css framework)",
        "tailwind css",
        "bulma",
        "foundation",
        "materialize css",
        "purecss",
        "tachyons",
        "semantic ui",
        "milligram",
        "uikit",
        "skeleton",
        "ant design",
        "spectre.css",
        "blueprint",
        "nes.css",
        "primer",
        "chota",
        "cirrus",
        "fomantic-ui",
        "wing",
        "water.css",
        "mustard ui",
        "turret css",
        "siimple",
        "min.css",
        "blaze css",
        "ballon.css",
        "litelement (css-in-js for web components)",
        "emotion (css-in-js library)",
        "aphrodite (css-in-js library)",
        "radium (css-in-js library)",
        "jss (css-in-js library)",
        "glamor (css-in-js library)",
        "linaria (zero-runtime css-in-js)",
        "stitches (css-in-js with near-zero runtime)",
        "css modules",
        "styled system",
        "gridlex",
        "reflexbox", // query languages

        "sql (structured query language)",
        "sparql (sparql protocol and rdf query language)",
        "xquery",
        "xpath",
        "datalog",
        "linq (language integrated query)",
        "cypher (for neo4j)",
        "gremlin (for graph databases)",
        "hiveql (for apache hive)",
        "pig latin (for apache pig)",
        "mdx (multidimensional expressions)",
        "cql (cassandra query language)",
        "aql (arangodb query language)",
        "flux (for influxdb)",
        "eql (event query language)",
        "n1ql (for couchbase)",
        "fql (fauna query language)",
        "pql (presto query language)",
        "soql (salesforce object query language)",
        "druid sql",
        "prestodb",
        "ksqldb (kafka sql)",
        "edgedb",
        "trl (tableau query language)",
        "spl (search processing language for splunk)",
        "prql (pipelined relational query language)",
        "srql (simple record query language)",
        "odata (open data protocol)",
        "bql (bigquery sql)",
        "gql (google analytics query language)",
        "graphql (used as a query language for apis)",
        "hql (hibernate query language)",
        "hypergraphql",
        "pql (prolog query language)",
        "aql (amazon query language)",
        "epl (esper query language)",
        "questdb sql",
        "ibm cognos query language",
        "objectscript sql",
        "power bi dax (data analysis expressions)",
        "drill sql",
        "phoenix sql",
        "ysql (yugabyte sql)",
        "dolphindb sql",
        "monetdb sql",
        "htapsql (hybrid transaction/analytical processing sql)",
        "phoenix pql (phoenix query language)",
        "sqlalchemy",
        "dataframe querying (pandas, etc.)",
        "databricks sql", // scripting languages

        "javascript",
        "python",
        "bash",
        "perl",
        "ruby",
        "php",
        "lua",
        "powershell",
        'react'
    ];

    let userMsg;

    chatBotIcon.addEventListener('click', () => {
        chatBot.classList.remove('d-none')
    })

    closeChat.addEventListener('click', () => {
        chatBot.classList.add('d-none')
    })


    const createChatLi = (message, className) => {
        const chatLi = document.createElement("li");
        chatLi.classList.add("chat", className);
        chatLi.innerHTML = `<p>${message}</p>`;
        return chatLi;
    };

    // ----------------------------------------------------------------------------
    // ----------------------------------------------------------------------------

    const chatHandler = () => {
        userMsg = chatInputUser.value.trim();
        if (!userMsg) return;
        chatBox.appendChild(createChatLi(userMsg, "userMsg"));

        if (allLanguages.includes(chatInputUser.value.trim().toLowerCase())) {

            $.post('./Admin Panel/topicRequest.php',
                { 'topicName': userMsg },
                function (data, status) {
                    chatBox.appendChild(createChatLi(data, "chatBotMsg"));
                    chatInputUser.value = '';
                    chatInputUser.setAttribute('disabled', 'true')
                    chatInputUser.setAttribute('placeholder', 'Initially its disabled .. we will enable it when its necessary.')
                }
            )
        } else {
            chatBox.appendChild(createChatLi("Enter topic name correctly", "chatBotMsg"));
            chatInputUser.value = '';
        }
    };

    chatSend.addEventListener("click", chatHandler);

    const yesNoChat = document.querySelectorAll(".yesNoChat");

    const yesNoHandler = (elm) => {
        const elementVal = elm.target.innerHTML;
        yesNoChat.forEach((elm) =>
            elm.removeEventListener("click", yesNoHandler)
        );
        if (elementVal === "Yes") {
            chatBox.appendChild(createChatLi("Enter topic name", "chatBotMsg"));
            chatInputUser.removeAttribute("disabled");
            chatInputUser.setAttribute("placeholder", "Enter Topic Name");
        } else if (elementVal === "No") {
            chatBox.appendChild(
                createChatLi(
                    "Opps , I am only made to request for topics. Please Enter Topic Name if none ,  Thank You",
                    "chatBotMsg"
                )
            );
        }
    };

    yesNoChat.forEach((elm) => elm.addEventListener("click", yesNoHandler));
</script>