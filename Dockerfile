FROM php

EXPOSE 2022
RUN mkdir /jmdc
WORKDIR /jmdc

CMD ["php","-S","0.0.0.0:2022","router.php"]
