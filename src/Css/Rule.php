<?php

namespace Qck\Ext\Css;

class Rule implements \Qck\Snippet
{

    function __construct( string $selector, Rules $rules = null )
    {
        $this->selector = $selector;
        $this->rules    = $rules;
    }

    /**
     * 
     * @return Rules
     */
    function rules()
    {
        return $this->rules;
    }

    function selector()
    {
        return $this->selector;
    }

    function setRules( Rules $rules ): Rule
    {
        $this->rules = $rules;
        return $this;
    }

    function clone( $newSelector ): Rule
    {
        $clone       = new Rule( $newSelector );
        $varsCleaned = $this->objectVarsCleaned();
        foreach ( $varsCleaned as $key => $value )
            $clone->set( $key, $value );
        if ( $this->rules )
            $this->rules->addRule( $clone );
        return $clone;
    }

    function set( $key, $value )
    {
        $this->$key = $value;
    }

    protected function objectVarsCleaned()
    {
        $vars        = get_object_vars( $this );
        $varsCleaned = [];
        foreach ( $vars as $key => $value )
        {
            if ( $key == "selector" || $key == "rules" || is_null( $value ) )
                continue;
            else
                $varsCleaned[ $key ] = $value;
        }
        return $varsCleaned;
    }

    function toString( $indent = null, $level = 0 )
    {
        $varsCleaned = $this->objectVarsCleaned();
        $code        = str_repeat( $indent, $level ) . $this->selector . PHP_EOL;
        $code        .= str_repeat( $indent, $level ) . "{" . PHP_EOL;
        foreach ( $varsCleaned as $key => $value )
        {
            $varName = null;
            for ( $i = 0; $i < mb_strlen( $key ); $i++ )
            {
                $char    = $key[ $i ];
                if ( ctype_upper( $char ) )
                    $varName .= "-" . lcfirst( $char );
                else
                    $varName .= $char;
            }

            $code .= str_repeat( $indent, $level + 1 ) . $varName . ": " . $value . ";" . PHP_EOL;
        }
        $code .= str_repeat( $indent, $level ) . "}";

        return $code;
    }

    function __toString()
    {
        $this->toString();
    }

    function setAlignContent( $alignContent ): Rule
    {
        $this->alignContent = $alignContent;
        return $this;
    }

    function setAlignItems( $alignItems ): Rule
    {
        $this->alignItems = $alignItems;
        return $this;
    }

    function setAlignSelf( $alignSelf ): Rule
    {
        $this->alignSelf = $alignSelf;
        return $this;
    }

    function setAnimation( $animation ): Rule
    {
        $this->animation = $animation;
        return $this;
    }

    function setAnimationDelay( $animationDelay ): Rule
    {
        $this->animationDelay = $animationDelay;
        return $this;
    }

    function setAnimationDirection( $animationDirection ): Rule
    {
        $this->animationDirection = $animationDirection;
        return $this;
    }

    function setAnimationDuration( $animationDuration ): Rule
    {
        $this->animationDuration = $animationDuration;
        return $this;
    }

    function setAnimationFillMode( $animationFillMode ): Rule
    {
        $this->animationFillMode = $animationFillMode;
        return $this;
    }

    function setAnimationIterationCount( $animationIterationCount ): Rule
    {
        $this->animationIterationCount = $animationIterationCount;
        return $this;
    }

    function setAnimationName( $animationName ): Rule
    {
        $this->animationName = $animationName;
        return $this;
    }

    function setAnimationPlayState( $animationPlayState ): Rule
    {
        $this->animationPlayState = $animationPlayState;
        return $this;
    }

    function setAnimationTimingFunction( $animationTimingFunction ): Rule
    {
        $this->animationTimingFunction = $animationTimingFunction;
        return $this;
    }

    function setBackfaceVisibility( $backfaceVisibility ): Rule
    {
        $this->backfaceVisibility = $backfaceVisibility;
        return $this;
    }

    function setBackground( $background ): Rule
    {
        $this->background = $background;
        return $this;
    }

    function setBackgroundAttachment( $backgroundAttachment ): Rule
    {
        $this->backgroundAttachment = $backgroundAttachment;
        return $this;
    }

    function setBackgroundClip( $backgroundClip ): Rule
    {
        $this->backgroundClip = $backgroundClip;
        return $this;
    }

    function setBackgroundColor( $backgroundColor ): Rule
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    function setBackgroundImage( $backgroundImage ): Rule
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    function setBackgroundOrigin( $backgroundOrigin ): Rule
    {
        $this->backgroundOrigin = $backgroundOrigin;
        return $this;
    }

    function setBackgroundPosition( $backgroundPosition ): Rule
    {
        $this->backgroundPosition = $backgroundPosition;
        return $this;
    }

    function setBackgroundRepeat( $backgroundRepeat ): Rule
    {
        $this->backgroundRepeat = $backgroundRepeat;
        return $this;
    }

    function setBackgroundSize( $backgroundSize ): Rule
    {
        $this->backgroundSize = $backgroundSize;
        return $this;
    }

    function setBorder( $border ): Rule
    {
        $this->border = $border;
        return $this;
    }

    function setBorderBottom( $borderBottom ): Rule
    {
        $this->borderBottom = $borderBottom;
        return $this;
    }

    function setBorderBottomColor( $borderBottomColor ): Rule
    {
        $this->borderBottomColor = $borderBottomColor;
        return $this;
    }

    function setBorderBottomLeftRadius( $borderBottomLeftRadius ): Rule
    {
        $this->borderBottomLeftRadius = $borderBottomLeftRadius;
        return $this;
    }

    function setBorderBottomRightRadius( $borderBottomRightRadius ): Rule
    {
        $this->borderBottomRightRadius = $borderBottomRightRadius;
        return $this;
    }

    function setBorderBottomStyle( $borderBottomStyle ): Rule
    {
        $this->borderBottomStyle = $borderBottomStyle;
        return $this;
    }

    function setBorderBottomWidth( $borderBottomWidth ): Rule
    {
        $this->borderBottomWidth = $borderBottomWidth;
        return $this;
    }

    function setBorderCollapse( $borderCollapse ): Rule
    {
        $this->borderCollapse = $borderCollapse;
        return $this;
    }

    function setBorderColor( $borderColor ): Rule
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    function setBorderImage( $borderImage ): Rule
    {
        $this->borderImage = $borderImage;
        return $this;
    }

    function setBorderImageOutset( $borderImageOutset ): Rule
    {
        $this->borderImageOutset = $borderImageOutset;
        return $this;
    }

    function setBorderImageRepeat( $borderImageRepeat ): Rule
    {
        $this->borderImageRepeat = $borderImageRepeat;
        return $this;
    }

    function setBorderImageSlice( $borderImageSlice ): Rule
    {
        $this->borderImageSlice = $borderImageSlice;
        return $this;
    }

    function setBorderImageSource( $borderImageSource ): Rule
    {
        $this->borderImageSource = $borderImageSource;
        return $this;
    }

    function setBorderImageWidth( $borderImageWidth ): Rule
    {
        $this->borderImageWidth = $borderImageWidth;
        return $this;
    }

    function setBorderLeft( $borderLeft ): Rule
    {
        $this->borderLeft = $borderLeft;
        return $this;
    }

    function setBorderLeftColor( $borderLeftColor ): Rule
    {
        $this->borderLeftColor = $borderLeftColor;
        return $this;
    }

    function setBorderLeftStyle( $borderLeftStyle ): Rule
    {
        $this->borderLeftStyle = $borderLeftStyle;
        return $this;
    }

    function setBorderLeftWidth( $borderLeftWidth ): Rule
    {
        $this->borderLeftWidth = $borderLeftWidth;
        return $this;
    }

    function setBorderRadius( $borderRadius ): Rule
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    function setBorderRight( $borderRight ): Rule
    {
        $this->borderRight = $borderRight;
        return $this;
    }

    function setBorderRightColor( $borderRightColor ): Rule
    {
        $this->borderRightColor = $borderRightColor;
        return $this;
    }

    function setBorderRightStyle( $borderRightStyle ): Rule
    {
        $this->borderRightStyle = $borderRightStyle;
        return $this;
    }

    function setBorderRightWidth( $borderRightWidth ): Rule
    {
        $this->borderRightWidth = $borderRightWidth;
        return $this;
    }

    function setBorderSpacing( $borderSpacing ): Rule
    {
        $this->borderSpacing = $borderSpacing;
        return $this;
    }

    function setBorderStyle( $borderStyle ): Rule
    {
        $this->borderStyle = $borderStyle;
        return $this;
    }

    function setBorderTop( $borderTop ): Rule
    {
        $this->borderTop = $borderTop;
        return $this;
    }

    function setBorderTopColor( $borderTopColor ): Rule
    {
        $this->borderTopColor = $borderTopColor;
        return $this;
    }

    function setBorderTopLeftRadius( $borderTopLeftRadius ): Rule
    {
        $this->borderTopLeftRadius = $borderTopLeftRadius;
        return $this;
    }

    function setBorderTopRightRadius( $borderTopRightRadius ): Rule
    {
        $this->borderTopRightRadius = $borderTopRightRadius;
        return $this;
    }

    function setBorderTopStyle( $borderTopStyle ): Rule
    {
        $this->borderTopStyle = $borderTopStyle;
        return $this;
    }

    function setBorderTopWidth( $borderTopWidth ): Rule
    {
        $this->borderTopWidth = $borderTopWidth;
        return $this;
    }

    function setBorderWidth( $borderWidth ): Rule
    {
        $this->borderWidth = $borderWidth;
        return $this;
    }

    function setBottom( $bottom ): Rule
    {
        $this->bottom = $bottom;
        return $this;
    }

    function setBoxShadow( $boxShadow ): Rule
    {
        $this->boxShadow = $boxShadow;
        return $this;
    }

    function setBoxSizing( $boxSizing ): Rule
    {
        $this->boxSizing = $boxSizing;
        return $this;
    }

    function setCaptionSide( $captionSide ): Rule
    {
        $this->captionSide = $captionSide;
        return $this;
    }

    function setClear( $clear ): Rule
    {
        $this->clear = $clear;
        return $this;
    }

    function setClip( $clip ): Rule
    {
        $this->clip = $clip;
        return $this;
    }

    function setColor( $color ): Rule
    {
        $this->color = $color;
        return $this;
    }

    function setColumnCount( $columnCount ): Rule
    {
        $this->columnCount = $columnCount;
        return $this;
    }

    function setColumnFill( $columnFill ): Rule
    {
        $this->columnFill = $columnFill;
        return $this;
    }

    function setColumnGap( $columnGap ): Rule
    {
        $this->columnGap = $columnGap;
        return $this;
    }

    function setColumnRule( $columnRule ): Rule
    {
        $this->columnRule = $columnRule;
        return $this;
    }

    function setColumnRuleColor( $columnRuleColor ): Rule
    {
        $this->columnRuleColor = $columnRuleColor;
        return $this;
    }

    function setColumnRuleStyle( $columnRuleStyle )
    {
        $this->columnRuleStyle = $columnRuleStyle;
        return $this;
    }

    function setColumnRuleWidth( $columnRuleWidth ): Rule
    {
        $this->columnRuleWidth = $columnRuleWidth;
        return $this;
    }

    function setColumnSpan( $columnSpan ): Rule
    {
        $this->columnSpan = $columnSpan;
        return $this;
    }

    function setColumnWidth( $columnWidth ): Rule
    {
        $this->columnWidth = $columnWidth;
        return $this;
    }

    function setColumns( $columns ): Rule
    {
        $this->columns = $columns;
        return $this;
    }

    function setContent( $content ): Rule
    {
        $this->content = $content;
        return $this;
    }

    function setCounterIncrement( $counterIncrement ): Rule
    {
        $this->counterIncrement = $counterIncrement;
        return $this;
    }

    function setCounterReset( $counterReset ): Rule
    {
        $this->counterReset = $counterReset;
        return $this;
    }

    function setCursor( $cursor ): Rule
    {
        $this->cursor = $cursor;
        return $this;
    }

    function setDirection( $direction ): Rule
    {
        $this->direction = $direction;
        return $this;
    }

    function setDisplay( $display ): Rule
    {
        $this->display = $display;
        return $this;
    }

    function setEmptyCells( $emptyCells ): Rule
    {
        $this->emptyCells = $emptyCells;
        return $this;
    }

    function setFlex( $flex ): Rule
    {
        $this->flex = $flex;
        return $this;
    }

    function setFlexBasis( $flexBasis ): Rule
    {
        $this->flexBasis = $flexBasis;
        return $this;
    }

    function setFlexDirection( $flexDirection ): Rule
    {
        $this->flexDirection = $flexDirection;
        return $this;
    }

    function setFlexFlow( $flexFlow ): Rule
    {
        $this->flexFlow = $flexFlow;
        return $this;
    }

    function setFlexGrow( $flexGrow ): Rule
    {
        $this->flexGrow = $flexGrow;
        return $this;
    }

    function setFlexShrink( $flexShrink ): Rule
    {
        $this->flexShrink = $flexShrink;
        return $this;
    }

    function setFlexWrap( $flexWrap ): Rule
    {
        $this->flexWrap = $flexWrap;
        return $this;
    }

    function setFloat( $float ): Rule
    {
        $this->float = $float;
        return $this;
    }

    function setFont( $font ): Rule
    {
        $this->font = $font;
        return $this;
    }

    function setFontFamily( $fontFamily ): Rule
    {
        $this->fontFamily = $fontFamily;
        return $this;
    }

    function setFontSize( $fontSize ): Rule
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    function setFontSizeAdjust( $fontSizeAdjust ): Rule
    {
        $this->fontSizeAdjust = $fontSizeAdjust;
        return $this;
    }

    function setFontStretch( $fontStretch ): Rule
    {
        $this->fontStretch = $fontStretch;
        return $this;
    }

    function setFontStyle( $fontStyle ): Rule
    {
        $this->fontStyle = $fontStyle;
        return $this;
    }

    function setFontVariant( $fontVariant ): Rule
    {
        $this->fontVariant = $fontVariant;
        return $this;
    }

    function setFontWeight( $fontWeight ): Rule
    {
        $this->fontWeight = $fontWeight;
        return $this;
    }

    function setHeight( $height ): Rule
    {
        $this->height = $height;
        return $this;
    }

    function setJustifyContent( $justifyContent ): Rule
    {
        $this->justifyContent = $justifyContent;
        return $this;
    }

    function setLeft( $left ): Rule
    {
        $this->left = $left;
        return $this;
    }

    function setLetterSpacing( $letterSpacing ): Rule
    {
        $this->letterSpacing = $letterSpacing;
        return $this;
    }

    function setLineHeight( $lineHeight ): Rule
    {
        $this->lineHeight = $lineHeight;
        return $this;
    }

    function setListStyle( $listStyle ): Rule
    {
        $this->listStyle = $listStyle;
        return $this;
    }

    function setListStyleImage( $listStyleImage ): Rule
    {
        $this->listStyleImage = $listStyleImage;
        return $this;
    }

    function setListStylePosition( $listStylePosition ): Rule
    {
        $this->listStylePosition = $listStylePosition;
        return $this;
    }

    function setListStyleType( $listStyleType ): Rule
    {
        $this->listStyleType = $listStyleType;
        return $this;
    }

    function setMargin( $margin ): Rule
    {
        $this->margin = $margin;
        return $this;
    }

    function setMarginBottom( $marginBottom ): Rule
    {
        $this->marginBottom = $marginBottom;
        return $this;
    }

    function setMarginLeft( $marginLeft ): Rule
    {
        $this->marginLeft = $marginLeft;
        return $this;
    }

    function setMarginRight( $marginRight ): Rule
    {
        $this->marginRight = $marginRight;
        return $this;
    }

    function setMarginTop( $marginTop ): Rule
    {
        $this->marginTop = $marginTop;
        return $this;
    }

    function setMaxHeight( $maxHeight ): Rule
    {
        $this->maxHeight = $maxHeight;
        return $this;
    }

    function setMaxWidth( $maxWidth ): Rule
    {
        $this->maxWidth = $maxWidth;
        return $this;
    }

    function setMinHeight( $minHeight ): Rule
    {
        $this->minHeight = $minHeight;
        return $this;
    }

    function setMinWidth( $minWidth ): Rule
    {
        $this->minWidth = $minWidth;
        return $this;
    }

    function setOpacity( $opacity ): Rule
    {
        $this->opacity = $opacity;
        return $this;
    }

    function setOrder( $order ): Rule
    {
        $this->order = $order;
        return $this;
    }

    function setOutline( $outline ): Rule
    {
        $this->outline = $outline;
        return $this;
    }

    function setOutlineColor( $outlineColor ): Rule
    {
        $this->outlineColor = $outlineColor;
        return $this;
    }

    function setOutlineOffset( $outlineOffset ): Rule
    {
        $this->outlineOffset = $outlineOffset;
        return $this;
    }

    function setOutlineStyle( $outlineStyle ): Rule
    {
        $this->outlineStyle = $outlineStyle;
        return $this;
    }

    function setOutlineWidth( $outlineWidth ): Rule
    {
        $this->outlineWidth = $outlineWidth;
        return $this;
    }

    function setOverflow( $overflow ): Rule
    {
        $this->overflow = $overflow;
        return $this;
    }

    function setOverflowX( $overflowX ): Rule
    {
        $this->overflowX = $overflowX;
        return $this;
    }

    function setOverflowY( $overflowY ): Rule
    {
        $this->overflowY = $overflowY;
        return $this;
    }

    function setPadding( $padding ): Rule
    {
        $this->padding = $padding;
        return $this;
    }

    function setPaddingBottom( $paddingBottom ): Rule
    {
        $this->paddingBottom = $paddingBottom;
        return $this;
    }

    function setPaddingLeft( $paddingLeft ): Rule
    {
        $this->paddingLeft = $paddingLeft;
        return $this;
    }

    function setPaddingRight( $paddingRight ): Rule
    {
        $this->paddingRight = $paddingRight;
        return $this;
    }

    function setPaddingTop( $paddingTop ): Rule
    {
        $this->paddingTop = $paddingTop;
        return $this;
    }

    function setPageBreakAfter( $pageBreakAfter ): Rule
    {
        $this->pageBreakAfter = $pageBreakAfter;
        return $this;
    }

    function setPageBreakBefore( $pageBreakBefore ): Rule
    {
        $this->pageBreakBefore = $pageBreakBefore;
        return $this;
    }

    function setPageBreakInside( $pageBreakInside ): Rule
    {
        $this->pageBreakInside = $pageBreakInside;
        return $this;
    }

    function setPerspective( $perspective ): Rule
    {
        $this->perspective = $perspective;
        return $this;
    }

    function setPerspectiveOrigin( $perspectiveOrigin ): Rule
    {
        $this->perspectiveOrigin = $perspectiveOrigin;
        return $this;
    }

    function setPosition( $position ): Rule
    {
        $this->position = $position;
        return $this;
    }

    function setQuotes( $quotes ): Rule
    {
        $this->quotes = $quotes;
        return $this;
    }

    function setResize( $resize ): Rule
    {
        $this->resize = $resize;
        return $this;
    }

    function setRight( $right ): Rule
    {
        $this->right = $right;
        return $this;
    }

    function setTabSize( $tabSize ): Rule
    {
        $this->tabSize = $tabSize;
        return $this;
    }

    function setTableLayout( $tableLayout ): Rule
    {
        $this->tableLayout = $tableLayout;
        return $this;
    }

    function setTextAlign( $textAlign ): Rule
    {
        $this->textAlign = $textAlign;
        return $this;
    }

    function setTextAlignLast( $textAlignLast ): Rule
    {
        $this->textAlignLast = $textAlignLast;
        return $this;
    }

    function setTextDecoration( $textDecoration ): Rule
    {
        $this->textDecoration = $textDecoration;
        return $this;
    }

    function setTextDecorationColor( $textDecorationColor ): Rule
    {
        $this->textDecorationColor = $textDecorationColor;
        return $this;
    }

    function setTextDecorationLine( $textDecorationLine ): Rule
    {
        $this->textDecorationLine = $textDecorationLine;
        return $this;
    }

    function setTextDecorationStyle( $textDecorationStyle ): Rule
    {
        $this->textDecorationStyle = $textDecorationStyle;
        return $this;
    }

    function setTextIndent( $textIndent ): Rule
    {
        $this->textIndent = $textIndent;
        return $this;
    }

    function setTextJustify( $textJustify ): Rule
    {
        $this->textJustify = $textJustify;
        return $this;
    }

    function setTextOverflow( $textOverflow ): Rule
    {
        $this->textOverflow = $textOverflow;
        return $this;
    }

    function setTextShadow( $textShadow ): Rule
    {
        $this->textShadow = $textShadow;
        return $this;
    }

    function setTextTransform( $textTransform ): Rule
    {
        $this->textTransform = $textTransform;
        return $this;
    }

    function setTop( $top ): Rule
    {
        $this->top = $top;
        return $this;
    }

    function setTransform( $transform ): Rule
    {
        $this->transform = $transform;
        return $this;
    }

    function setTransformOrigin( $transformOrigin ): Rule
    {
        $this->transformOrigin = $transformOrigin;
        return $this;
    }

    function setTransformStyle( $transformStyle ): Rule
    {
        $this->transformStyle = $transformStyle;
        return $this;
    }

    function setTransition( $transition ): Rule
    {
        $this->transition = $transition;
        return $this;
    }

    function setTransitionDelay( $transitionDelay ): Rule
    {
        $this->transitionDelay = $transitionDelay;
        return $this;
    }

    function setTransitionDuration( $transitionDuration ): Rule
    {
        $this->transitionDuration = $transitionDuration;
        return $this;
    }

    function setTransitionProperty( $transitionProperty ): Rule
    {
        $this->transitionProperty = $transitionProperty;
        return $this;
    }

    function setTransitionTimingFunction( $transitionTimingFunction ): Rule
    {
        $this->transitionTimingFunction = $transitionTimingFunction;
        return $this;
    }

    function setVerticalAlign( $verticalAlign ): Rule
    {
        $this->verticalAlign = $verticalAlign;
        return $this;
    }

    function setVisibility( $visibility ): Rule
    {
        $this->visibility = $visibility;
        return $this;
    }

    function setWhiteSpace( $whiteSpace ): Rule
    {
        $this->whiteSpace = $whiteSpace;
        return $this;
    }

    function setWidth( $width ): Rule
    {
        $this->width = $width;
        return $this;
    }

    function setWordBreak( $wordBreak ): Rule
    {
        $this->wordBreak = $wordBreak;
        return $this;
    }

    function setWordSpacing( $wordSpacing ): Rule
    {
        $this->wordSpacing = $wordSpacing;
        return $this;
    }

    function setWordWrap( $wordWrap ): Rule
    {
        $this->wordWrap = $wordWrap;
        return $this;
    }

    function setZIndex( $zIndex ): Rule
    {
        $this->zIndex = $zIndex;
        return $this;
    }

    /**
     *
     * @var string 
     */
    protected $selector;

    /**
     *
     * @var Rules 
     */
    protected $rules;

    /**
     * Specifies the alignment of flexible container's items within the flex container.
     * @var mixed
     */
    protected $alignContent;

    /**
     * Specifies the default alignment for items within the flex container.
     * @var mixed
     */
    protected $alignItems;

    /**
     * Specifies the alignment for selected items within the flex container.
     * @var mixed
     */
    protected $alignSelf;

    /**
     * Specifies the keyframe-based animations.
     * @var mixed
     */
    protected $animation;

    /**
     * Specifies when the animation will start.
     * @var mixed
     */
    protected $animationDelay;

    /**
     * Specifies whether the animation should play in reverse on alternate cycles or not.
     * @var mixed
     */
    protected $animationDirection;

    /**
     * Specifies the number of seconds or milliseconds an animation should take to complete one cycle.
     * @var mixed
     */
    protected $animationDuration;

    /**
     * Specifies how a CSS animation should apply styles to its target before and after it is executing.
     * @var mixed
     */
    protected $animationFillMode;

    /**
     * Specifies the number of times an animation cycle should be played before stopping.
     * @var mixed
     */
    protected $animationIterationCount;

    /**
     * Specifies the name of@keyframesdefined animations that should be applied to the selected element.
     * @var mixed
     */
    protected $animationName;

    /**
     * Specifies whether the animation is running or paused.
     * @var mixed
     */
    protected $animationPlayState;

    /**
     * Specifies how a CSS animation should progress over the duration of each cycle.
     * @var mixed
     */
    protected $animationTimingFunction;

    /**
     * Specifies whether or not the "back" side of a transformed element is visible when facing the user.
     * @var mixed
     */
    protected $backfaceVisibility;

    /**
     * Defines a variety of background properties within one declaration.
     * @var mixed
     */
    protected $background;

    /**
     * Specify whether the background image is fixed in the viewport or scrolls.
     * @var mixed
     */
    protected $backgroundAttachment;

    /**
     * Specifies the painting area of the background.
     * @var mixed
     */
    protected $backgroundClip;

    /**
     * Defines an element's background color.
     * @var mixed
     */
    protected $backgroundColor;

    /**
     * Defines an element's background image.
     * @var mixed
     */
    protected $backgroundImage;

    /**
     * Specifies the positioning area of the background images.
     * @var mixed
     */
    protected $backgroundOrigin;

    /**
     * Defines the origin of a background image.
     * @var mixed
     */
    protected $backgroundPosition;

    /**
     * Specify whether/how the background image is tiled.
     * @var mixed
     */
    protected $backgroundRepeat;

    /**
     * Specifies the size of the background images.
     * @var mixed
     */
    protected $backgroundSize;

    /**
     * Sets the width, style, and color for all four sides of an element's border.
     * @var mixed
     */
    protected $border;

    /**
     * Sets the width, style, and color of the bottom border of an element.
     * @var mixed
     */
    protected $borderBottom;

    /**
     * Sets the color of the bottom border of an element.
     * @var mixed
     */
    protected $borderBottomColor;

    /**
     * Defines the shape of the bottom-left border corner of an element.
     * @var mixed
     */
    protected $borderBottomLeftRadius;

    /**
     * Defines the shape of the bottom-right border corner of an element.
     * @var mixed
     */
    protected $borderBottomRightRadius;

    /**
     * Sets the style of the bottom border of an element.
     * @var mixed
     */
    protected $borderBottomStyle;

    /**
     * Sets the width of the bottom border of an element.
     * @var mixed
     */
    protected $borderBottomWidth;

    /**
     * Specifies whether table cell borders are connected or separated.
     * @var mixed
     */
    protected $borderCollapse;

    /**
     * Sets the color of the border on all the four sides of an element.
     * @var mixed
     */
    protected $borderColor;

    /**
     * Specifies how an image is to be used in place of the border styles.
     * @var mixed
     */
    protected $borderImage;

    /**
     * Specifies the amount by which the border image area extends beyond the border box.
     * @var mixed
     */
    protected $borderImageOutset;

    /**
     * Specifies whether the image-border should be repeated, rounded or stretched.
     * @var mixed
     */
    protected $borderImageRepeat;

    /**
     * Specifies the inward offsets of the image-border.
     * @var mixed
     */
    protected $borderImageSlice;

    /**
     * Specifies the location of the image to be used as a border.
     * @var mixed
     */
    protected $borderImageSource;

    /**
     * Specifies the width of the image-border.
     * @var mixed
     */
    protected $borderImageWidth;

    /**
     * Sets the width, style, and color of the left border of an element.
     * @var mixed
     */
    protected $borderLeft;

    /**
     * Sets the color of the left border of an element.
     * @var mixed
     */
    protected $borderLeftColor;

    /**
     * Sets the style of the left border of an element.
     * @var mixed
     */
    protected $borderLeftStyle;

    /**
     * Sets the width of the left border of an element.
     * @var mixed
     */
    protected $borderLeftWidth;

    /**
     * Defines the shape of the border corners of an element.
     * @var mixed
     */
    protected $borderRadius;

    /**
     * Sets the width, style, and color of the right border of an element.
     * @var mixed
     */
    protected $borderRight;

    /**
     * Sets the color of the right border of an element.
     * @var mixed
     */
    protected $borderRightColor;

    /**
     * Sets the style of the right border of an element.
     * @var mixed
     */
    protected $borderRightStyle;

    /**
     * Sets the width of the right border of an element.
     * @var mixed
     */
    protected $borderRightWidth;

    /**
     * Sets the spacing between the borders of adjacent table cells.
     * @var mixed
     */
    protected $borderSpacing;

    /**
     * Sets the style of the border on all the four sides of an element.
     * @var mixed
     */
    protected $borderStyle;

    /**
     * Sets the width, style, and color of the top border of an element.
     * @var mixed
     */
    protected $borderTop;

    /**
     * Sets the color of the top border of an element.
     * @var mixed
     */
    protected $borderTopColor;

    /**
     * Defines the shape of the top-left border corner of an element.
     * @var mixed
     */
    protected $borderTopLeftRadius;

    /**
     * Defines the shape of the top-right border corner of an element.
     * @var mixed
     */
    protected $borderTopRightRadius;

    /**
     * Sets the style of the top border of an element.
     * @var mixed
     */
    protected $borderTopStyle;

    /**
     * Sets the width of the top border of an element.
     * @var mixed
     */
    protected $borderTopWidth;

    /**
     * Sets the width of the border on all the four sides of an element.
     * @var mixed
     */
    protected $borderWidth;

    /**
     * Specify the location of the bottom edge of the positioned element.
     * @var mixed
     */
    protected $bottom;

    /**
     * Applies one or more drop-shadows to the element's box.
     * @var mixed
     */
    protected $boxShadow;

    /**
     * Alter the default CSS box model.
     * @var mixed
     */
    protected $boxSizing;

    /**
     * Specify the position of table's caption.
     * @var mixed
     */
    protected $captionSide;

    /**
     * Specifies the placement of an element in relation to floating elements.
     * @var mixed
     */
    protected $clear;

    /**
     * Defines the clipping region.
     * @var mixed
     */
    protected $clip;

    /**
     * Specify the color of the text of an element.
     * @var mixed
     */
    protected $color;

    /**
     * Specifies the number of columns in a multi-column element.
     * @var mixed
     */
    protected $columnCount;

    /**
     * Specifies how columns will be filled.
     * @var mixed
     */
    protected $columnFill;

    /**
     * Specifies the gap between the columns in a multi-column element.
     * @var mixed
     */
    protected $columnGap;

    /**
     * Specifies a straight line, or "rule", to be drawn between each column in a multi-column element.
     * @var mixed
     */
    protected $columnRule;

    /**
     * Specifies the color of the rules drawn between columns in a multi-column layout.
     * @var mixed
     */
    protected $columnRuleColor;

    /**
     * Specifies the style of the rule drawn between the columns in a multi-column layout.
     * @var mixed
     */
    protected $columnRuleStyle;

    /**
     * Specifies the width of the rule drawn between the columns in a multi-column layout.
     * @var mixed
     */
    protected $columnRuleWidth;

    /**
     * Specifies how many columns an element spans across in a multi-column layout.
     * @var mixed
     */
    protected $columnSpan;

    /**
     * Specifies the optimal width of the columns in a multi-column element.
     * @var mixed
     */
    protected $columnWidth;

    /**
     * A shorthand property for settingcolumn-widthandcolumn-countproperties.
     * @var mixed
     */
    protected $columns;

    /**
     * Inserts generated content.
     * @var mixed
     */
    protected $content;

    /**
     * Increments one or more counter values.
     * @var mixed
     */
    protected $counterIncrement;

    /**
     * Creates or resets one or more counters.
     * @var mixed
     */
    protected $counterReset;

    /**
     * Specify the type of cursor.
     * @var mixed
     */
    protected $cursor;

    /**
     * Define the text direction/writing direction.
     * @var mixed
     */
    protected $direction;

    /**
     * Specifies how an element is displayed onscreen.
     * @var mixed
     */
    protected $display;

    /**
     * Show or hide borders and backgrounds of empty table cells.
     * @var mixed
     */
    protected $emptyCells;

    /**
     * Specifies the components of a flexible length.
     * @var mixed
     */
    protected $flex;

    /**
     * Specifies the initial main size of the flex item.
     * @var mixed
     */
    protected $flexBasis;

    /**
     * Specifies the direction of the flexible items.
     * @var mixed
     */
    protected $flexDirection;

    /**
     * A shorthand property for theflex-directionand theflex-wrapproperties.
     * @var mixed
     */
    protected $flexFlow;

    /**
     * Specifies how the flex item will grow relative to the other items inside the flex container.
     * @var mixed
     */
    protected $flexGrow;

    /**
     * Specifies how the flex item will shrink relative to the other items inside the flex container.
     * @var mixed
     */
    protected $flexShrink;

    /**
     * Specifies whether the flexible items should wrap or not.
     * @var mixed
     */
    protected $flexWrap;

    /**
     * Specifies whether or not a box should float.
     * @var mixed
     */
    protected $float;

    /**
     * Defines a variety of font properties within one declaration.
     * @var mixed
     */
    protected $font;

    /**
     * Defines a list of fonts for element.
     * @var mixed
     */
    protected $fontFamily;

    /**
     * Defines the font size for the text.
     * @var mixed
     */
    protected $fontSize;

    /**
     * Preserves the readability of text when font fallback occurs.
     * @var mixed
     */
    protected $fontSizeAdjust;

    /**
     * Selects a normal, condensed, or expanded face from a font.
     * @var mixed
     */
    protected $fontStretch;

    /**
     * Defines the font style for the text.
     * @var mixed
     */
    protected $fontStyle;

    /**
     * Specify the font variant.
     * @var mixed
     */
    protected $fontVariant;

    /**
     * Specify the font weight of the text.
     * @var mixed
     */
    protected $fontWeight;

    /**
     * Specify the height of an element.
     * @var mixed
     */
    protected $height;

    /**
     * Specifies how flex items are aligned along the main axis of the flex container after any flexible lengths and auto margins have been resolved.
     * @var mixed
     */
    protected $justifyContent;

    /**
     * Specify the location of the left edge of the positioned element.
     * @var mixed
     */
    protected $left;

    /**
     * Sets the extra spacing between letters.
     * @var mixed
     */
    protected $letterSpacing;

    /**
     * Sets the height between lines of text.
     * @var mixed
     */
    protected $lineHeight;

    /**
     * Defines the display style for a list and list elements.
     * @var mixed
     */
    protected $listStyle;

    /**
     * Specifies the image to be used as a list-item marker.
     * @var mixed
     */
    protected $listStyleImage;

    /**
     * Specifies the position of the list-item marker.
     * @var mixed
     */
    protected $listStylePosition;

    /**
     * Specifies the marker style for a list-item.
     * @var mixed
     */
    protected $listStyleType;

    /**
     * Sets the margin on all four sides of the element.
     * @var mixed
     */
    protected $margin;

    /**
     * Sets the bottom margin of the element.
     * @var mixed
     */
    protected $marginBottom;

    /**
     * Sets the left margin of the element.
     * @var mixed
     */
    protected $marginLeft;

    /**
     * Sets the right margin of the element.
     * @var mixed
     */
    protected $marginRight;

    /**
     * Sets the top margin of the element.
     * @var mixed
     */
    protected $marginTop;

    /**
     * Specify the maximum height of an element.
     * @var mixed
     */
    protected $maxHeight;

    /**
     * Specify the maximum width of an element.
     * @var mixed
     */
    protected $maxWidth;

    /**
     * Specify the minimum height of an element.
     * @var mixed
     */
    protected $minHeight;

    /**
     * Specify the minimum width of an element.
     * @var mixed
     */
    protected $minWidth;

    /**
     * Specifies the transparency of an element.
     * @var mixed
     */
    protected $opacity;

    /**
     * Specifies the order in which a flex items are displayed and laid out within a flex container.
     * @var mixed
     */
    protected $order;

    /**
     * Sets the width, style, and color for all four sides of an element's outline.
     * @var mixed
     */
    protected $outline;

    /**
     * Sets the color of the outline.
     * @var mixed
     */
    protected $outlineColor;

    /**
     * Set the space between an outline and the border edge of an element.
     * @var mixed
     */
    protected $outlineOffset;

    /**
     * Sets a style for an outline.
     * @var mixed
     */
    protected $outlineStyle;

    /**
     * Sets the width of the outline.
     * @var mixed
     */
    protected $outlineWidth;

    /**
     * Specifies the treatment of content that overflows the element's box.
     * @var mixed
     */
    protected $overflow;

    /**
     * Specifies the treatment of content that overflows the element's box horizontally.
     * @var mixed
     */
    protected $overflowX;

    /**
     * Specifies the treatment of content that overflows the element's box vertically.
     * @var mixed
     */
    protected $overflowY;

    /**
     * Sets the padding on all four sides of the element.
     * @var mixed
     */
    protected $padding;

    /**
     * Sets the padding to the bottom side of an element.
     * @var mixed
     */
    protected $paddingBottom;

    /**
     * Sets the padding to the left side of an element.
     * @var mixed
     */
    protected $paddingLeft;

    /**
     * Sets the padding to the right side of an element.
     * @var mixed
     */
    protected $paddingRight;

    /**
     * Sets the padding to the top side of an element.
     * @var mixed
     */
    protected $paddingTop;

    /**
     * Insert a page breaks after an element.
     * @var mixed
     */
    protected $pageBreakAfter;

    /**
     * Insert a page breaks before an element.
     * @var mixed
     */
    protected $pageBreakBefore;

    /**
     * Insert a page breaks inside an element.
     * @var mixed
     */
    protected $pageBreakInside;

    /**
     * Defines the perspective from which all child elements of the object are viewed.
     * @var mixed
     */
    protected $perspective;

    /**
     * Defines the origin (the vanishing point for the 3D space): CssRule for the perspective property.
     * @var mixed
     */
    protected $perspectiveOrigin;

    /**
     * Specifies how an element is positioned.
     * @var mixed
     */
    protected $position;

    /**
     * Specifies quotation marks for embedded quotations.
     * @var mixed
     */
    protected $quotes;

    /**
     * Specifies whether or not an element is resizable by the user.
     * @var mixed
     */
    protected $resize;

    /**
     * Specify the location of the right edge of the positioned element.
     * @var mixed
     */
    protected $right;

    /**
     * Specifies the length of the tab character.
     * @var mixed
     */
    protected $tabSize;

    /**
     * Specifies a table layout algorithm.
     * @var mixed
     */
    protected $tableLayout;

    /**
     * Sets the horizontal alignment of inline content.
     * @var mixed
     */
    protected $textAlign;

    /**
     * Specifies how the last line of a block or a line right before a forced line break is aligned whentext-alignisjustify.
     * @var mixed
     */
    protected $textAlignLast;

    /**
     * Specifies the decoration added to text.
     * @var mixed
     */
    protected $textDecoration;

    /**
     * Specifies the color of thetext-decoration-line.
     * @var mixed
     */
    protected $textDecorationColor;

    /**
     * Specifies what kind of line decorations are added to the element.
     * @var mixed
     */
    protected $textDecorationLine;

    /**
     * Specifies the style of the lines specified by thetext-decoration-lineproperty
     * @var mixed
     */
    protected $textDecorationStyle;

    /**
     * Indent the first line of text.
     * @var mixed
     */
    protected $textIndent;

    /**
     * Specifies the justification method to use when thetext-alignproperty is set tojustify.
     * @var mixed
     */
    protected $textJustify;

    /**
     * Specifies how the text content will be displayed, when it overflows the block containers.
     * @var mixed
     */
    protected $textOverflow;

    /**
     * Applies one or more shadows to the text content of an element.
     * @var mixed
     */
    protected $textShadow;

    /**
     * Transforms the case of the text.
     * @var mixed
     */
    protected $textTransform;

    /**
     * Specify the location of the top edge of the positioned element.
     * @var mixed
     */
    protected $top;

    /**
     * Applies a 2D or 3D transformation to an element.
     * @var mixed
     */
    protected $transform;

    /**
     * Defines the origin of transformation for an element.
     * @var mixed
     */
    protected $transformOrigin;

    /**
     * Specifies how nested elements are rendered in 3D space.
     * @var mixed
     */
    protected $transformStyle;

    /**
     * Defines the transition between two states of an element.
     * @var mixed
     */
    protected $transition;

    /**
     * Specifies when the transition effect will start.
     * @var mixed
     */
    protected $transitionDelay;

    /**
     * Specifies the number of seconds or milliseconds a transition effect should take to complete.
     * @var mixed
     */
    protected $transitionDuration;

    /**
     * Specifies the names of the CSS properties to which a transition effect should be applied.
     * @var mixed
     */
    protected $transitionProperty;

    /**
     * Specifies the speed curve of the transition effect.
     * @var mixed
     */
    protected $transitionTimingFunction;

    /**
     * Sets the vertical positioning of an element relative to the current text baseline.
     * @var mixed
     */
    protected $verticalAlign;

    /**
     * Specifies whether or not an element is visible.
     * @var mixed
     */
    protected $visibility;

    /**
     * Specifies how white space inside the element is handled.
     * @var mixed
     */
    protected $whiteSpace;

    /**
     * Specify the width of an element.
     * @var mixed
     */
    protected $width;

    /**
     * Specifies how to break lines within words.
     * @var mixed
     */
    protected $wordBreak;

    /**
     * Sets the spacing between words.
     * @var mixed
     */
    protected $wordSpacing;

    /**
     * Specifies whether to break words when the content overflows the boundaries of its container.
     * @var mixed
     */
    protected $wordWrap;

    /**
     * Specifies a layering or stacking order for positioned elements.
     * @var mixed
     */
    protected $zIndex;

}
