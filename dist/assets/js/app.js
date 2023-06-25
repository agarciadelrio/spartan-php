document.addEventListener('alpine:init', () => {
  Alpine.data('Slider', () => ({
    index:0,
    count:0,
    sleep: 1000,
    transition: 500,
    interval:undefined,
    init() {
      this.sleep = this.$root.dataset.sleep || this.sleep;
      let newnode = this.$root.querySelector('a').cloneNode(true);
      this.$root.append(newnode)
      this.count = this.$root.childElementCount
      const sleep = this.$root.children[this.index].dataset.sleep || this.sleep
      this.interval = setTimeout(this.next.bind(this), sleep)
    },
    next() {
      this.index+=1;
      if(this.index>=this.count) {
        this.index = 0;
        this.$root.style.transitionDuration = '0ms'
        this.interval = setTimeout(this.next.bind(this), 0)
      } else {
        const sleep = this.$root.children[this.index].dataset.sleep || this.sleep
        this.$root.style.transitionDuration = `${this.transition}ms`
        this.interval = setTimeout(this.next.bind(this), sleep)
      }
      this.$root.style.transform = `translateX(-${this.index*100}%)`
    },
    onEnterFrame() {
      clearTimeout(this.interval)
      this.index-=1;
      if(this.index<0) this.index = 0
    },
    onLeaveFrame() {
      this.interval = setTimeout(this.next.bind(this), this.transition)
    },
    onScroll() {
      console.log('onScroll', this.index);
    }
  }))
})