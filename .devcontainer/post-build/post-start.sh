echo "+++++++++++++NODE+++++++++++++++++"
npm cache clean -f
npm install -g n
sudo -E env "PATH=$PATH" n 18
