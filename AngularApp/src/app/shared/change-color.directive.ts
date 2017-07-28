import { Directive, HostListener, ElementRef, Renderer } from '@angular/core';

@Directive({
  selector: '[appChangeColor]'
})
export class ChangeColorDirective {

  constructor(
        private renderer: Renderer,
        private el: ElementRef
    ){}
    // Event listeners for element hosting
    // the directive
    @HostListener('mouseenter') onMouseEnter() {
        this.hover(true);
    }

    @HostListener('mouseleave') onMouseLeave() {
        this.hover(false);
    }
    // Event method to be called on mouse enter and on mouse leave
    hover(shouldChangeColor: boolean){
        if(shouldChangeColor){
        // Mouse enter   
          this.renderer.setElementStyle(this.el.nativeElement, 'background-color', '#c1c199');
        } else {
    // Mouse leave           
          this.renderer.setElementStyle(this.el.nativeElement, 'background-color', '#ffcc06');
        }
    }
}
